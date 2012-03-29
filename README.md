# Jobtester

Is an simple singlepoint entry MVC based framework written in PHP which uses Smarty as template engine and an  
file-based JSON structure as database. All framework code are undocumented.

## Folder structure

## Todo

Your job is to write an simple Addressbook Application based on the framework. 

 * There should exist an view where the user are able to display all existing contacts, and the properties
   first_name last_name, email, of these existing contacts. 

   1. The name of the Contact should exist as an link that when clicked transfers the user to an new view 
      with more details about the contact. 

   2. There Should exist an link on each of the contacts that enables the user to be tranfered to the new view
      where the user should be able to edit the contact

 * The non editable view should display all information we know about the Contact such as first_name, last_name
   email, age, street, postal_code and city.
   
   1. The user needs to be able to click on something here to get to some view where he can edit the content.

 * The editable view should enable the user to edit all infromation we know about the contact such as first_name, 
   last_name, email, age, street, postal_code and city.

   1. The user must be able to save the edited contacts information to the database.
   
   2. When the information have been saved the user should be transfered to the detail the view that 
      displays all details about the contact. 

 * The shold exist an method for the user to create and add new Contacts to the Addressbook.

