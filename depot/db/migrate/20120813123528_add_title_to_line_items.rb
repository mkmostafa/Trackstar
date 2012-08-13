class AddTitleToLineItems < ActiveRecord::Migration
  def up
  	add_column :line_items, :title, :string, :default => 'Untitled'
  end
end
