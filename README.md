# My Game List
My Game List
You can see it in action at <a href="https://mygames.andrewzaw.com" target="_blank">https://mygames.andrewzaw.com</a>

<b>What does this app do?</b> You can list, add, edit, and even rate games from your own game collection.
The application will be using PHP version 5+ with mySQL.

# Installation

<ol>
  <li>First clone the repo.</li>

  <li>Edit the <i>/Model/DatabaseConfig.php</i> and enter your own database and login information.

    class DatabaseConfig<br>
    {
      const
      DB_HOST = '(the host name to your mySQL here)',
      DB_NAME = '(the name of the database here)',
      DB_USER = '(user name to connect to this database)',
      DB_PASS = '(the password to connect to this database)';
    }

  </li>


  <li>Run the "install.sql". There are two options.
    The first option is using phpMyAdmin or other admin tools can be used to administer your database to import the "install.sql" file. The other options is importing the file using the command line: `mysql -u [user] -p < install.sql`
  </li>
</ol>

# What I would do if I were to spend more time on the project

<ol>
<li>
<p><b>Improve the alert for users that enters and save duplicate records (combination of <i>name</i> and <i>publisher</i>).</b> Currently there is a unique key setup so that there can be only once record of publisher and name combination. At this point there will only be an alert that the record was not save, however no indication as to the reason why the data was not saved. There was not enough time to implement this.</p>

<p>To detect the duplication error, I will need to get the value from the `Query` class located in the `Modal` directory. The array value containing the PDO `errorInfo` will indicate the driver-specific error code to be `1062` on the second position of the error message array. By reading the error code, an appropriate response can be alerted.</p>
</li>

<li><p><b>The 'edit game' feature was not implemented in time.</b> It just needed is a query to load the existing data and populate it into the form fields for the user to make changes.</p>
<p>Both 'adding new game' and 'editing game' uses the same function, with the exception that the 'editing game' function passes the `id` of the record while 'creating new game' passes `0`, since there is no `0` index number in the data table, it is used to indicate that a new record should be created.</p>

<p>From the security stand point, using the id of the table would mean someone can potentially intercept the id. However, considering the context and the scope of this project is does not warrant any motivation to intercept the id. The id of each record is no secret, unlike a financial record, this will give any malicious attempt information on another game record that is already available. However, if I had more time, and the context warrant more protection, I can improve security by adding a GUID/UUID column in the data table which will be a longer and randomized set of character sting assigned to each record. That can be used instead so that there won't be an order for someone to guess a numerical pattern like the using the id.</p>

<p>Also, there is room for better user experience, when updating a record, that I would of like to add, if there was time. On update, if a user wants to change only one thing, it is unnecessary to save all fields. Instead, each field can be saved after the user makes changes. For example, if the user needs to make changes to the `publisher` field, after the user enter a given field, it would save the value that field rather than saving the whole form again. Using `onblur` in each field would do the trick, because `onblur` unlike `onkeyup` even allows the user to finish typing and move to other things. `onblur` is applicable for any type of field that would require typing. Other types of input like drop downs and radio button can benefit from `onchange` and `onclick` event handlers. The data entered would be validated, sanitized, and updated. The result of the save would be using jQuery UI, to shake the text box if the save failed and to nod or bounce if it was successful. This had been proven to work, because I use this on many occasions in my current job. The is instantly communicated the user without using words to communicate the results.</p>
</li>

<li>
<p><b>Add Pagination, as there will be millions of records.</b> I just didn't have the time to implement pagination.
By default, the current limit is set to show 10 records at a time. At each request to load the game list, there will be two queries. The first is to get a total count of the results. The total results can deferrer when filters and searches are involved. The second query will load the actual data with the limits implemented. The values will be saved in $_SESSION.</p>

<p>Here is why $_SESSION is great. Firstly they are on the server side, unlike using cookies, they are safer (as long as the session number is not revealed to the public). They can hold arrays of multidimensions of data and even blobs (yes, I've stored binary filled PDF into a session before), and I use them to cache results, temp files and global variables, in this case can hold data over different pages without passing values directly.</p>

  <p>In our case we can use them to store the total number of records, the amount of records to load, and the current page. Session values can also be emptied when appropriate.</p>

  <blockquote>
  $_SESSION['total_records'];<br>
  $_SESSION['records_per_page'];<br>
  $_SESSION['current_page'];<br>
  $_SESSION['total_num_of_pages'];<br>
  </blockquote>

  <p>In the query it would look like this `... LIMIT BY $_SESSION['current_records'], $_SESSION['records_per_page']`;</p>

  <p>The currents records would be the offset, incremented by the `records_per_page`. For example if the record per page is 10, then the current records would increment by 10, 20, 30, etc. This increment is done by multiplying `current_records` by `current_page`.</p>

  <p>The total number of pages, `total_num_of_pages`, are determined by `total_records` divided by `records_per_page`. If there are remainders which can be determined by the modulus (%) remainder of `total_records` % `records_per_page`, then an additional page added to the `total_num_of_pages`.</p>

  <p>Regarding the <b>previous</b> and <b>next</b> buttons, here is how they will be handled. The previous button in the pagination would subtract 1 from `current_page`, (and `current_records` times `current_page`) as long as it does not equal zero. If it equals zero, the previous button will be disabled. The next button will add 1 to the `current_page` until it is less than the total number of pages determined above where `total_num_of_pages` equals `current_page`.</p>

  </li>

<li>
<p><b>Add a delete feature for each record.</b> If something can be added, there must be a way to delete it. A button with a trash icon or even the word delete should be added. When clicked on, there should be a confirmation to proceed (Using JavaScript `if(confirm('Are you sure you want to remove this game?') == true){ //remove code here }`).
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

<ul>
<li>I would implement the feature to upload and display thumbnails of game titles. (This will involve uploading images, cropping and resizing).</li>
<li>Link to the Steam or GOG library if anyone clicks on it.</li>
<li>Filter by genres.</li>
<li>User login system. You won't want strangers randomly editing 'your' list of games while you want others be able use the search.</li>
</ul>

# Things that were done

## Cleaning
Data entered on the server end is sanitized using placeholders by using `PDO::prepare()` and `PDOStatement::execute()`.
On the PHP end, I could of converted the $_POST variables to the correct data types. For instance, the rating values are integers, therefore an example would be `$rating = (int)$_POST['rating'];`

## Validation
Two steps in the validation process.
<ol>
<li>Validation client side to ensure the required data is not left blank or wrong values being entered with instant feedback.</li>
<li>Additional validation on the server side to ensure no duplicates are entered.</li>
</ol>

## Scaling or Failing
If installation is done correctly, a finished version of this project can stand on its own (given some updates required over time).
The project at this point is incomplete, and would not scale as is.

## Let's Talk Data

<b>While creating mySQL table, here is how the requirements were handled:</b>

<p>`id` (integer) added to the data table, with auto increment, index, and primary keys.
Given that there will be millions of records (which is vague, because millions can make up billions), and that there can only be one game/publisher, I've decided to use `int` for the `id`, unassigned, which has a limitation of 2,147,483,647 instead of `bigint` is because in the whole wide world, currently there are over 5 million games in existence (according to nationaltoday.com, okay I don't know where else to get this data so I've Googled it). The bottom line is `int` is plenty and enough for our use case.</p>

<p>`InnoDB` storage engine for mySQL is used to handle millions of records (it can handle a billion rows so a few million is not a problem).</p>

<p>The `unique` key was assigned to the combination of `publisher` and `name`. So any attempt to insert the games with same name and publisher will result in errors.</p>

<p>`publisher` and `name` are required, so `NOT NULL` was assigned.</p>
<p>`NULL` was assigned to `nickname` and `rating` since they can be NULL.</p>

<p>`fulltext` keys where added to `publisher`,`name`, and `nickname` for quicker searches (we can use `MATCH` `AGAINST` for natural language mode of search).<br><i>For example: `SELECT id FROM game_list WHERE MATCH(publisher, name, nickname) AGAINST('mario nintendo' IN NATURAL LANGUAGE MODE)`</i></p>


## Notes and Comments

<p>Honestly this is my first time using GitHub.</p>

<p>A decision was made to use CDN links for Bootstrap in place to Composer Packagist. In the interest of time decided to go with CDN link because staging, committing, and pushing the files and dependencies from Packagist to GitHub was taking too long.</p>

<p>In addition to Bootstrap, jQuery CDN was used. I've also used my premade snippets that I modify over the years to use for my various projects to increase efficiency.</p>

<p>Are you curious to know what strange paradigm and framework was used? It is MVC with Ajax (to update the contents without reloading the page) with a custom framework.</p>

<p>The pages flows as follows: includes -> routes -> view -> controllers<br>
On each page, the interactions like forms are submitted to -> JavaScript (Ajax) -> special classes (PHP files with prefix Aj containing tasks) which returns in JSON format, using JavaScript, selectively returns to different portions of the page.</p>

<p>As you might notice, I place all HTML in strings with escaped double quotes. This way it is easier to treat them as objects embedded into classes.</p>

<p>I am open-minded and willing to use what works best for each scenario. I am ready to learn and adapt new standards and practices while seeking for peer and mentors for guidance and experience. I was deprived of such opportunity and hopes to join your team of likeminded individuals.</p>
