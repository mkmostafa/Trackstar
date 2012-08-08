class StoreController < ApplicationController
	

	def index
		@products = Product.all
		@cart = current_cart
		@user_store_access_count = user_store_access_count
	end


end
