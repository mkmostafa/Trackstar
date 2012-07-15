class Product < ActiveRecord::Base
  default_scope :order => 'title'
  attr_accessible :description, :image_url, :title, :price
  validates_presence_of :description, :image_url, :title, :price
  validates_numericality_of :price,
                            :message => ' you entered is not a number'
  validate :price_must_be_at_least_a_cent
  validates_uniqueness_of :title,
                          :message => 'was chosen before'
  validates_format_of :image_url,
                      :with => %r{\.(Gif|PNG|jpg)$}i,
                      :message => 'must be for a ' +
                                   'PNG, jpg or Gif'
  validate :length_of_title_must_be_at_least_10

  protected 

  def length_of_title_must_be_at_least_10
    errors.add(:title, 'Must at least have 10 characters') if title.nil? || title.length < 10 
  end

  
  protected
  
  def price_must_be_at_least_a_cent
    errors.add(:price, 'Should be greater than zero') if price.nil? || price <= 0 
  end
  
end
