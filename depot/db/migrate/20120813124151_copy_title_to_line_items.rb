class CopyTitleToLineItems < ActiveRecord::Migration
  def up
  	for @item in LineItem.all
  	begin
  		@product = Product.find(@item.product_id)
  	rescue ActiveRecord::RecordNotFound
  			@item.title = 'Untitled'
  			@item.save
  		else
  			@item.title = @product.title
  			@item.save
  		end
  	end
  end

  def down
  end
end
