require 'test_helper'

class ProductTest < ActiveSupport::TestCase
   
   fixtures :products



   test "the truth" do
     assert true
   end

     test "product attributes must not be empty" do
     product = Product.new
     assert product.invalid?
     assert product.errors[:title].any?
     assert product.errors[:description].any?
     assert product.errors[:image_url].any?
     assert product.errors[:price].any?
   end

   test "product price must be positve" do
   product = Product.new(:title => "title_title",
                         :description => "description",
                         :image_url => "img.png")
    product.price = -1
    assert product.invalid?
    assert_equal "Should be greater than zero",
    product.errors[:price].join('; ')
    
    product.price = 0
    assert product.invalid?
    assert_equal "Should be greater than zero",
    product.errors[:price].join('; ')

	product.price = 9
	assert product.valid?

    end


    def new_product(img_url) 
    	product = Product.new(:title => "title_title",
    	                       :description => "description",
    	                       :price => 10,
    	                       :image_url => img_url)
    end

    test "image_url" do
     
     ok = %w{ cena.jpg cena.Gif cena.PNG http://a.b.c/x/y/z/fred.gif }
     bad = %w{fred.doc fred.gif/more fred.gif.more}

     ok.each do |name|
     	assert new_product(name).valid?
     end

     bad.each do |name|
     	assert new_product(name).invalid?
     end

    end


    test "product must have a unique title" do
    	product = Product.new(:title => products(:ruby).title,
    	:description => "description",
    	:price => 10,
    	:image_url => "rails.png")

    	assert !product.save
    	assert_equal "was chosen before", product.errors[:title].join('; ')
    end


end
