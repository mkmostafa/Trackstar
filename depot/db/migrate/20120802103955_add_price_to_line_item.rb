class AddPriceToLineItem < ActiveRecord::Migration
  def self.up
  	add_column :line_items, :price, :decimal, :default => 0,
  	            :scale => 2, :precision => 8
  end

end
