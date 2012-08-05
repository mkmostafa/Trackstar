class LineItem < ActiveRecord::Base
  attr_accessible :cart_id, :product,:product_id ,:quantity, :price, 
                  :foreign_key => 'product_id',:foreign_key => 'cart_id'
  belongs_to :product
  belongs_to :cart

  def total_price
  	 price * quantity
  end
  
end
