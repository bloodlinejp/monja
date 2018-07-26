json.extract! user, :id, :name, :mail, :age, :address, :birthday, :created_at, :updated_at
json.url user_url(user, format: :json)
