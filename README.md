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
- [x] Optimise controller functions (5 in total)
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
3. Similar thing can be optimised for the 'userpets' function<br/>
4. Updated the pet food query into the one query in 'userpets' data return will still be the same but cleaner and shorter function<br/>
5. You can preset date formats so the lines running a manual date format in the 'userspost' function is not needed<br/>
6. Cleanup of comments and the 'deletepets' function<br/>
<br/>
<br/>
## Final Comments
Even though some datapoints for the views may have changed, the function of this is the same.<br/>
It includes the splitting of the original file into the route, controller and model components.<br/>
Optimising calls to have the models run the data testing and only requesting the one row required from the table is better data wise<br/>
On of the main things being replaced in these files is the 'count' sections of code use to set a variable as the first instance.<br/>
eg.
```
if (count($users) > 0) {
        $user = $users[0];
    }
```
AND
```
if (count($pets) > 0) {
```
Aditionally the main insert statement for he post needed to also be updated