require 'test_helper'

class StoreControllerTest < ActionController::TestCase
   
   fixtures :products




   test "the truth" do
     assert true
   end


    test "should get index" do
     get :index
     assert_response :success
     assert_select '#columns #side a', :minimum => 4
     assert_select '#main .entry', 3
     assert_select 'h3', 'programming ruby 1.9'
     assert_select '.price' , /\$[,\d]+\.\d\d/
   end

end
