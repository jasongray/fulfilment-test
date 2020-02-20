# New endpoint to instigate customer order fulfilment
## User Story
As a warehouse officer I want to be able to initiate an order run so that I can deliver orders according to my pending orders and inventory availability.
## Background
New Order Management System Services (NOMSS) has been created to manage our customer orders and order fulfilment processes to replace our legacy system. Your task is quite simple, create the api specified in this ticket and show us how you would normally approach a task like this. 

Although we’re not looking for an all-encompassing solution, covering every edge case you might encounter, we do expect you to treat it with the same care you would with any work you would normally do. Although we’ve only specified a single endpoint in this ticket, feel free to create any others in order to help test your work. 

Along with this document you would’ve received a sample data file called data.json. It contains three products and four orders, feel free to use this file as you see fit, but don’t modify it. Each time your sample application runs it should read from the unmodified file.
## Requirement
New Order Management System Services requires the endpoint `POST api/v1/warehouse/fulfilment` to be created. 

It will accept an array of Order IDs to process orders for fulfilment and shipping. 

If an order cannot be fulfilled due to low stock levels, it will return an array of order ids unfulfillable and not process the Order Fulfilment. 

If the stock quantity falls below the re-order threshold a new purchase order should be generated. For the purposes of this exercise assume that an endpoint for this service already exists, although you may have to stub something out to get things working. As long as you can verify that a purchase order has been created when stock levels fall to low, that’s all that’s required.


# Setup and Usage

1. load script from `config/schema/testdata.sql`
2. run `<myservername>/orders/reload` in your favorite browser to load the data from json.
3. run the api endpoint `<myservername>/api/v1/warehouse/fulfilment` probable in postman or similar.
3. enjoy the magic!
