#This is from Mongo, so it is going to perform differently from other class. For example, we're not initializing anything in it

class OrderSubmission

  include Mongoid::Document
  include Mongoid::Timestamps

  field :sqft, type: Integer #TODO Make sure to turn into Integer
  field :agentFirstName, type: String
  field :agentLastName, type: String
  field :agentEmail, type: String
  field :agentPhone, type: String
  field :otherEmail, type: String
  field :address1Prop, type: String
  field :address2Prop, type: String
  field :city, type: String
  field :state, type: String
  field :zipcode, type: String
  field :hdrPhotos, type: String
  field :panoramas, type: String
  field :spw, type: String
  field :domain, type: String
  field :domainURL, type: String
  field :preliminaryPhotos, type: String
  field :fullVideo, type: String
  field :fullTwilightVideo, type: String
  field :videoClips, type: String
  field :twilightVideoClips, type: String
  field :access, type: String
  field :date, type: String
  field :time, type: String
  field :referral, type: String
  field :notes, type: String
  field :vendor, type: String

  scope :search, lambda {|query|
    where(["name LIKE ?", "%#{query}%"])
  }

  def self.create_order(
    sqft, agentFirstName, agentLastName, agentEmail,
    agentPhone, otherEmail, address1Prop,
    address2Prop, city, state, zipcode, hdrPhotos,
    panoramas, spw, domain, domainURL, preliminaryPhotos,
    fullVideo, fullTwilightVideo, videoClips, twilightVideoClips,
    access, date, time, referral, notes, vendor)
    db.order_submissions.insert( {
      sqft: blank,
      agentFirstName: blank,
      agentLastName: blank,
      agentEmail: blank,
      agentPhone: blank,
      otherEmail: blank,
      address1Prop: blank,
      address2Prop: blank,
      city: blank,
      state: blank,
      zipcode: blank,
      hdrPhotos: blank,
      panoramas: blank,
      spw: blank,
      domain: blank,
      domainURL: blank,
      preliminaryPhotos: blank,
      fullVideo: blank,
      fullTwilightVideo: blank,
      videoClips: blank,
      twilightVideoClips: blank,
      access: blank,
      date: blank,
      time: blank,
      referral: blank,
      notes: blank,
      vendor: blank
      } )
      self.save
  end

end