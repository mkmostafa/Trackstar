require 'test_helper'

class LineItemTest < ActiveSupport::TestCase

   fixtures :products
   fixtures :carts

   setup do
   	@product = products(:ruby)
   	@product2 = products(:macbook)
   	@cart = carts(:one)
   	@cart2 = carts(:two)
    end

   test "the truth" do
     assert true
   end

   test "adding distinct products" do
   	@cart.add_product(@product.id)
   	@cart.add_product(@product2.id)
   	total_line_items = LineItem.count(:all, :conditions => {:cart_id => '1'})
   	assert_equal(total_line_items, 2, 'The number of distinct items is NOT 2')
   end

   test "adding duplicate products" do
      @cart2.add_product(@product.id)
      @cart2.add_product(@product.id)
      @cart2.add_product(@product.id)
      quantity = LineItem.where('product_id = ? AND cart_id = ?', 3 , 2).first.quantity
      assert_equal(quantity, 3, 'The quantity of the line item is not 2')

   end

end
