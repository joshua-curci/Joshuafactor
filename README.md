# Joshua Refactor test for inoutput
This is a test provided by inoutput for a job opportunity that is available.<br/>
Initial PHP code provided is located in the file 'initial-PHP-script.php'<br/>
Refactored code is located in the folder 'Refactor'<br/>
## Planning
Having an initial look at base code provided the first step would be to set up controllers and split off the routes from the actual functions.<br/>
Next would be to look at every function separately as to see what each function is doing. Again form the initial look we would like to then run the DB commands through a 'model' instead of running them inline.<br/>
I can also see that there is foreach that is not going to return the right data so that will need to be fixed and there is also form validation that can be cleaned up and optimised maybe even with custom messages.<br/>
ToDo list should be as follows:<br/>
- [x] Split routes from functions in their own controllers
- [x] Put DB calls into models
- [ ] Optimise controller functions (5 in total)
- [ ] Test incomplete foreach returns and function errors
<br/>
<br/>
### Split routes from functions in their own controllers
At a base level, we simply need to split the routes and the controller functions into their own files.<br/>
This is going to come in handy later when we then build the models for these functions<br/>
### Put DB calls into models
Compleated with custom table names<br/>
### Optimise controller functions (5 in total)
Being done in parts<br/>
1. Optimising and updating the insert statement in the UserController<br/>
2. In the 'selecteduser' function, you are getting a unique user, you can optimise this code by simply getting the first returned result of the unique ID<br/>