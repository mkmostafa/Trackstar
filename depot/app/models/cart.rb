class Cart < ActiveRecord::Base
  attr_accessible :title, :body, :product, :foreign_key => 'product'
  has_many :line_items, :dependent => :destroy

  def add_product(product_id)
    product = Product.find(product_id)
    current_item = line_items.where('product_id = ? AND price = ?',product_id, product.price).first                 
  	if(current_item)
  		 current_item.quantity += 1
       current_item.save
  	else
  		current_item = LineItem.new(:product_id => product_id, 
                                  :price => product.price,
                                  :title => product.title)
  		line_items << current_item
  	end
  	current_item
  end



  def total_price
    total = 0
    for @item in line_items
      total += @item.price * @item.quantity
    end
    total
  end

  def total_items
    total = 0
    for @item in line_items
      total += @item.quantity
    end
      total
  end

end
