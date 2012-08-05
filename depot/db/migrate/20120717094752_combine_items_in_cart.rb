class CombineItemsInCart < ActiveRecord::Migration
  def up
  	Cart.all.each do |cart|
  		sums = cart.line_items.group(:product_id).sum(:quantity)
  		
  		sums.each do |product_id, quantity|
  			if(quantity > 1)
  				cart.line_items.where(:product_id => product_id).delete_all
  				cart.line_items.create(:product_id => product_id, :quantity => quantity)
  			end
  		end
  	end
  end

  def down
    Cart.all.each do |cart|
       items = cart.line_items.where("quantity > 1")
       items.each do |item|
        cart.line_items.where(:product_id => item.product_id).delete_all
          for i in 0..item.quantity
            cart.line_items.create(:product_id => item.product_id, :quantity => 1)
          end
       end
    end
  end

end
