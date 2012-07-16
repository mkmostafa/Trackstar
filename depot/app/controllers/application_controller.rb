class ApplicationController < ActionController::Base
  protect_from_forgery

  private 
  def current_cart
  	Cart.find(session[:cart_id])
  rescue ActiveRecord::RecordNotFound
  	cart = Cart.create
  	session[:cart_id] = cart.id
  	cart
  end

  private 
  def user_store_access_count
  	if(session[:counter].nil?)
  	    session[:counter] = 0
  	else
  		session[:counter] += 1
  	end
  end

end
