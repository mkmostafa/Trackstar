    class CartsController < ApplicationController
      # GET /carts
      # GET /carts.json
      def index
        @carts = Cart.all
        @cart = current_cart
        respond_to do |format|
          format.html # index.html.erb
          format.json { render json: @carts }
        end
      end

      # GET /carts/1
      # GET /carts/1.json
      def show
        begin
        @cart = Cart.find(params[:id])
        rescue ActiveRecord::RecordNotFound
        logger.error "Attempt to access invalid cart {params[:id]}"
        redirect_to store_url, :notice => 'Invalid Cart'
        else 
        respond_to do |format|
          format.html # show.html.erb
          format.json { render json: @cart }
        end
        end
      end

      # GET /carts/new
      # GET /carts/new.json
      def new
        @cart = Cart.new
        @cart.save
        respond_to do |format|
          format.html {render action: 'new'}# new.html.erb
          format.json { render json: @cart }
        end
      end

      # GET /carts/1/edit
      def edit
        @cart = Cart.find(params[:id])
      end

      # POST /carts
      # POST /carts.json
      def create
        @cart = Cart.new(params[:cart])

        respond_to do |format|
          if @cart.save
            format.html { redirect_to @cart, notice: 'Cart was successfully created.' }
            format.json { render json: @cart, status: :created, location: @cart }
          else
            format.html { render action: "new" }
            format.json { render json: @cart.errors, status: :unprocessable_entity }
          end
        end
      end


      # PUT /carts/1
      # PUT /carts/1.json
      def update
        @cart = Cart.find(params[:id])

        respond_to do |format|
          if @cart.update_attributes(params[:cart])
            format.html { redirect_to @cart, notice: 'Cart was successfully updated.' }
            format.json { head :no_content }
          else
            format.html { render action: "edit" }
            format.json { render json: @cart.errors, status: :unprocessable_entity }
          end
        end
      end

      # DELETE /carts/1
      # DELETE /carts/1.json
      def destroy
        @cart = Cart.find(params[:id])
        @cart.line_items.delete_all
        @cart.save
        respond_to do |format|
          format.js
          format.html { redirect_to store_url }
          format.xml {head :ok}

        end
      end

      def remove_item_from_cart 
        begin
        @cart = current_cart
        @cart_id = @cart.id
        @line_item = LineItem.find(params[:id])
      rescue ActiveRecord::RecordNotFound
      else
        if(@line_item.quantity > 1)
          @line_item.quantity -= 1
          @line_item.save
        else
          @line_item.delete
        end
          @cart.save
      end
        respond_to do |format|
          format.js
          format.html { redirect_to :back }
        end
      end

    end
