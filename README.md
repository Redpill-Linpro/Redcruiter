# Redcruiter

Is an small singlepoint entry application framework written in PHP, relying on Smarty as template engine. With the main
purpose to see if an candidate have an basic understanding of OOP PHP and patterns such as MVC. The framework in its 
current state makes use of an file-based JSON data-store to ensure flexibility in creation of candidate tests.

## Folder structure

## Todo

Your job is to write an simple address book application based on the framework. 

 * There should exist an view where the user are able to display all existing contacts, and the properties
   first_name last_name, email, of these existing contacts. 

   1. The name of the Contact should exist as an link that when clicked transfers the user to an new view 
      with more details about the contact. 

   2. There Should exist an link on each of the contacts that enables the user to be tranfered to the new view
      where the user should be able to edit the contact

 * The non editable view should display all information we know about the Contact such as first_name, last_name
   email, age, street, postal_code and city.
   
   1. The user needs to be able to click on something here to get to some view where he can edit the content.

 * The editable view should enable the user to edit all information we know about the contact such as first_name, 
   last_name, email, age, street, postal_code and city.

   1. The user must be able to save the edited contacts information to the database.
   
   2. When the information have been saved the user should be transferred to the detail the view that 
      displays all details about the contact. 

 * There should exist an method for the user to create and add new Contacts to the address book.

### Hints

 * It would be considered not in your favour solving the tasks by accessing the file-based database from any 
   other other than the DataBaseManager.
