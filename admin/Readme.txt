
Database Create
dbName: safal

tables:

users
id | name | email | username | password | status | created_at | updated_at

abouts
id | top_title | top_desc | title | description | img | status | created_at | updated_at


skills
id | title | description | status | created_at | updated_at

facts
id | numbers | title | status | created_at | updated_at


testimonials
id | img | name | position | message | status | created_at | updated_at


services
id | icon | title | description | status | created_at | updated_at

contacts
id | name | email | subject | message | status | created_at | updated_at


files
id | title | description | img_link | type | status | created_at | updated_at

resume_titles
id | title | status | created_at | updated_at

resume
id |resume_title_id | title | start_date | end_date| org_name| description  | status | created_at | updated_at


portfolio
id |  category_id |client_id | project_name| proj_start_date | proj_end_ate| proj_ulr|description     | status | created_at | updated_at

categories
id | title | desc | status | created_at | updated_at

clients
id | name | phone | email | address | status | created_at | updated_at

project_images
id | project_id | img | status | created_at | updated_at

settings
id | site_key | site_value | status | created_at | updated_at

