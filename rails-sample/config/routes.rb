Rails.application.routes.draw do
resources :posts do
  resources :comments
end
resources :posts
  get 'welcome/index'
  root 'welcome#index'
end