class LineItem < ActiveRecord::Base
  attr_accessible :cart_id, :product,:product_id ,:quantity, :price, :title,
                  :foreign_key => 'product_id',:foreign_key => 'cart_id'
  belongs_to :product
  belongs_to :cart

  validate :cart_is_valid 
  validate :product_is_valid

  def cart_is_valid
  	begin
  	@cart = Cart.find(cart_id)
    rescue ActiveRecord::RecordNotFound
    	errors.add(:cart_id,'Is Invalid Cart')
    else
    end
  end

  def product_is_valid
  	begin
  		@product = Product.find(product_id)
  	rescue ActiveRecord::RecordNotFound
  		errors.add(:product_id, 'Is Invalid Product')
  	else
  	end
  end


  def total_price
  	 price * quantity
  end
  
end
