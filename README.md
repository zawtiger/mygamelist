# My Game List
My Game List
You can see it in action at <a href="https://mygames.andrewzaw.com" target="_blank">https://mygames.andrewzaw.com</a>

Games from your own game collection that you can add and rate.
The application will be using PHP and mySQL.

# Installation

1) First clone the repo.
2) Edit the <i>/Model/DatabaseConfig.php</i>

  <blockquote>
  <i>
  class DatabaseConfig<br>
  {<br>
    const
    DB_HOST = '(the host name to your mySQL here)',<br>
    DB_NAME = '(the name of the database here)',<br>
    DB_USER = '(user name to connect to this database)',<br>
    DB_PASS = '(the password to connect to this database)';<br>
  }</i>
  </blockquote>

3) Run the "install.sql". There are two options.

  a) You can use phpMyAdmin or other admin tools to administer your database to import the "install.sql" file.
  or
  b) On command line: `mysql -u [user] -p < install.sql`

# What I would do if I were to spend more time on the project

<ol>
<li>
<p><b>Improve the alert for users that enters and save duplicate records (combination of name and publisher).</b> Currently there is a unique key setup so that there can be only once record of publisher and name combination. At this point there will only be an alert that the record was not save, however no indication as to the reason.</p>

<p>To detect the duplication error, I will need to get the value from the Query class. The array value containing the PDO `errorInfo` will indicate the driver-specific error code to be `1062` on the second position of the error message array.</p>
</li>

<li><p><b>The edit feature was not implemented in time.</b> All it needed is a query to load the existing data and populate it into the form fields for the user to make changes.</p>
<p>Both 'adding new game' and 'editing game' uses the same function, with the exception that the 'editing game' function passes the `id` of the record while 'creating new game' passes `0`, since there is no `0` index number, a new record should be created.</p>

<p>In the scope of this project is too small to want to intercept the id. However, if I had more time, I can make it more secure by adding a GUID/UUID column in the data table which will be a longer and randomized set of stings assigned to each record.</p>

<p>Also, there is room for better user experience when updating a record that I would of like to add if there was time. On update, if a user wants to change only one thing, it is not necessary to save all fields again. Instead, each field can be saved after the user makes changes. For example, if the user need to make changes to the publisher field, it would save the field after they've entered the information. Using `onblur` in each field would do the trick. The data entered would be validated, sanitized, and updated. The result of the save would be using jQuery UI, to shake the text box if the save failed and to nod or bounce if it was successful. This had been proven to work, because I use this on many occasions in my current job. The is instantly communicated the user without using words to communicate the results.</p>
</li>

<li>
<p><b>Add Pagination, as there will be millions of records.</b> I have it almost in place, just didn't have the time.
By default, the current limit is set to show 10 records at a time. At each request to load the game list, there will be two queries. The first is to get a total count of the results. The total results can be different when filters and searches are involved. The second query will load the actual data with the limit implemented. The values will be saved in $_SESSION.</p>
</li>

  <li><p>Here is why $_SESSIONs are great. Firstly they are on the server side, unlike using cookies, they are safer (just don't reveal the session number to the public). They can hold arrays multidimensions of data and even blobs, and I use them to cache results, temp files and global variables that can hold data over different pages.</p>

  <p>In our case we can use them to store the total number of records, the amount of records to load, and the current page.</p>

  <blockquote>
  $_SESSION['total_records'];<br>
  $_SESSION['records_per_page'];<br>
  $_SESSION['current_page'];<br>
  $_SESSION['total_num_of_pages'];<br>
  </blockquote>

  <p>In the query it would be `LIMIT BY $_SESSION['current_records'], $_SESSION['records_per_page']`;</p>

  <p>The currents records would be the offset that is incremented by the `records_per_page`. For example if the record per page is 10, it the current records would increment by 10, 20, 30, etc. This increment is done by multiplying `current_records` by `current_page`.</p>

  <p>The total number of pages, `total_num_of_pages`, are determined by `total_records` divided by `records_per_page`. An additional page added to the total, if there are remainders which can be determined by the modulus (%) remainder of `total_records` % `records_per_page`.</p>

  <p>The previous and next buttons. The previous button in the pagination would subtract 1 from `current_page`, (and `current_records` times `current_page`) as long as it does not equal zero. If it equals zero, the previous button will be disabled. The next button will add 1 to the `current_page` until it is less than the total number of pages determined above where `total_num_of_pages` equals `current_page`.</p>

  </li>

<li>
<p><b>Add a delete feature.</b> If something can be added, there must be a way to delete it. A button with a trash icon or even the word delete should be added. When clicked on, there should be a confirmation to proceed (Using JavaScript `if(confirm('Are you sure you want to remove this game?') == true){ //remove code here }`).
</p>
</li>

<li>
<p><b>Change the rating dropdown into buttons that are stylized radio buttons.</b> Again, in the interest of time, I had to abandoned using buttons to layout the rating, and do a quick dropdown in place of a line of buttons that would have worked better as an interface. If I had even more time, the numbers would be stars instead.</p>
</li>

<li>
<p><b>Display each game as cards with thumbnails, instead of a table.</b> The UI/UX designer in me is prefers cards, especially with images. It is more engaging than boring old table. Also, I can implement uploading, cropping, and resizing cards.</p>
</li>
</ol>

## Features that would be cool
-I would implement the feature to upload and display thumbnails of game titles. (This will involve uploading images, cropping and resizing).
-Link to the Steam or GOG library if anyone clicks on it.
-Filter by genres.
-User login system. You won't want others randomly editing 'your' list of games while you want others be able use the search.

# Things that were done

## Cleaning
Data entered on the server end is sanitized using placeholders by using `PDO::prepare()` and `PDOStatement::execute()`.
On the PHP end, I could of converted the $_POST variables to the correct data types. For example, the rating values are integers. So an example would be `$rating = (int)$_POST['rating'];`

## Validation
Two steps in the validation process.
1) Validation client side to ensure the required data is not left blank or wrong values being entered with instant feedback.
2) Additional validation on the server side to ensure no duplicates are entered.

## Scaling or Failing
If installation is done correctly, a finished version of this project can stand on its own (given some updates required over time).
The project at this point is incomplete, and would not scale.

## Let's Talk Data

<b>While creating mySQL table, here is how the requirements were handled:</b>

`id` (integer) added to the data table, with auto increment, index, and primary keys.
Given that there will be millions of records (which is vague, because millions can make up billions), and that there can only be one game/publisher, I've decided to use `int` for the `id`, unassigned, which has a limitation of 2,147,483,647 instead of `bigint` is because in the whole wide world, there are over 5 million games in existence (according to nationaltoday.com, okay I don't know where else to get this data). The bottom line is `int` is plenty and enough for our use case.

`InnoDB` is used to handle millions of records (it can handle a billion rows so a few million is not a problem).

The `unique` key was assigned to the combination of `publisher` and `name`. So any attempt to insert the games with same name and publisher will result in errors.

`publisher` and `name` are required, so NOT NULL was assigned.
NULL was assigned to `nickname` and `rating` since they can be NULL.

`fulltext` keys where added to `publisher`,`name`, and `nickname` for quicker searches (we can use MATCH AGAINST for natural language mode of search).

<i>Forexample: `SELECT id FROM game_list WHERE MATCH(publisher, name, nickname) AGAINST('mario nintendo' IN NATURAL LANGUAGE MODE)`</b>


## Notes

<p>Honestly this is my first time using GitHub.</p>

<p>A decision was made to use CDN for Bootstrap in place to Composer Packagist. In the interest of time decided to go with CDN link because staging, committing, and pushing the files and dependencies to GitHub was taking too long.</p>

<p>Curious to know what strange paradigm and framework was used? It is MVC with Ajax (to update the contents without reloading the page) with a custom framework.</p>

<p>The pages flows as follows: includes -> routes -> view -> controllers<br>
On each page, the interactions like forms are submitted to -> JavaScript (Ajax) -> special classes (PHP files with prefix Aj containing tasks) which returns in JSON format, using JavaScript, selectively returns to different portions of the page.</p>

<p>As you might notice, I place all HTML in strings with escaped double quotes. This way it is easier to treat them as objects embedded into classes.
I am open-minded and willing to use what works best. Ready to adapt new stands and practices and seeking for peer and mentors for guidance and experience.</p>
