# Joshua Refactor test for inoutput
This is a test provided by inoutput for a job opportunity that is available.<br/>
Initial PHP code provided is located in the file 'initial-PHP-script.php'<br/>
Refactored code is located in the folder 'Refactor'<br/>
## Planning
Having an initial look at base code provided the first step would be to set up controllers and split off the routes from the actual functions.<br/>
Next would be to look at every function separately as to see what each function is doing. Again form the initial look we would like to then run the DB commands through a 'model' instead of running them inline.<br/>
I can also see that there is foreach that is not going to return the right data so that will need to be fixed and there is also form validation that can be cleaned up and optimised maybe even with custom messages.<br/>
ToDo list should be as follows:<br/>
- [ ] Split routes from functions in their own controllers
- [ ] Optimise controller functions by putting DB calls into models
- [ ] Optimise form validations
- [ ] Test incomplete foreach returns and function errors
**Further updates to come**