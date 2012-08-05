class AddTitleToCarts < ActiveRecord::Migration
  def change
  	add_column :carts, :title, :string
  end
end
