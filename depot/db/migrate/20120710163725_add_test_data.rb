class AddTestData < ActiveRecord::Migration
  def self.up
    Product.delete_all
    Product.create(:title => 'MacBook Pro',:description => 'Laptop', :price => 9999.0, :image_url => '/Desktop/1.jpg')
  end

  def self.down
  	Product.delete_all
  end
end
