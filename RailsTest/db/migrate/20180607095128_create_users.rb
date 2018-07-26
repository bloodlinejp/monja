class CreateUsers < ActiveRecord::Migration[5.2]
  def change
    create_table :users do |t|
      t.string :name
      t.string :mail
      t.integer :age
      t.string :address
      t.date :birthday

      t.timestamps
    end
  end
end
