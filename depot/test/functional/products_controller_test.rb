require 'test_helper'

class ProductsControllerTest < ActionController::TestCase
  setup do
    @product = products(:one)
    @product2 = products(:ruby)
  end

  
  test "should get index" do
    get :index
    assert_response :success
    assert_not_nil assigns(:products)
  end

  test "should get new" do
    get :new
    assert_response :success
  end

  #test "should create product" do
   # assert_difference('Product.count') do
    #  post :create, product: { description: @product.description, image_url: @product.image_url, title: @product.title, price: @product.price }
    #end

    #assert_redirected_to product_path(assigns(:product))
  #end

  test "should show product" do
    get :show, id: @product
    assert_response :success
  end

  test "should get edit" do
    get :edit, id: @product2
    assert_response :success
  end

  #test "should update product" do
   # put :update, id: @product, product: { description: @product.description, image_url: @product.image_url, title: @product.title, price: @product.price }
    #assert_redirected_to product_path(assigns(:product))
  #end

  test "should destroy product" do
    assert_difference('Product.count', -1) do
      delete :destroy, id: @product2
    end

    assert_redirected_to products_path
  end
  
  test "There are 2 entries" do
    get :index
    assert_select '.list-image', 4
    assert_select '.list-price', "Price: 9.99 $"
  end
  

end
