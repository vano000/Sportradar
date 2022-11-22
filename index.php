<?php 
      require_once "Includes/filter.php";
      require_once "includes/teams-data.php";
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sono:wght@300&display=swap" rel="stylesheet">
    <title>SportRadar Calendar</title>
</head>

<body>

    <h1 class="mainTitel">Sport Calendar</h1>

    <div class="filter">
        <form id="filter">
            <h4>I am Interested in:</h4>
            <label><u>All</u> <input type="radio" name="search_type" value="all"  ></label>
            <label><u>Football</u><i class='far fa-futbol' style='font-size:15px'></i> <input type="radio" name="search_type" value="1"  ></label>
            <label><u>BasketBall</u><i class='fas fa-basketball-ball' style='font-size:15px'></i> <input type="radio" name="search_type" value="2"  ></label>
            <br>
            <br>
            <button class="eventBtn" type="submit"> Show Events</button>
        </form>
    </div>

    <button id="popupBtn">Add a new Event</button>



    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">x</span>
            <div id="event_form">


                <form id="eventfrm" method="post" action="includes/add-event.php">

                    <h4>Add your Sport Event Info:</h4>
                    <input type="datetime-local" name="start" id="start" class="effect-6">
                    <br>
                    <br>
                    <input type="hidden" name="end" id="end">

                    <select class="effect-6" name="home">
                    <?php
                     while($row = mysqli_fetch_assoc($home)){
                        ?>
                        <option value="<?php echo $row['Name']; ?>">
                            <?php echo $row['Name']; ?>
                        </option>
                        <?php
                        }
                    ?>
                    </select> VS

                    <select class="effect-6" name="away">
                    <?php
                     while($row = mysqli_fetch_assoc($away)){
                        ?>
                        <option value="<?php echo $row['Name']; ?>">
                            <?php echo $row['Name']; ?>
                        </option>
                        <?php
                        }
                    ?>
                    </select>
                    
                    <br>
                    <br>
                    <label>What kind of Sport is it?</label>
                    <br>
                    <br>
                    <label>Football <input type="radio" name="_sport_type" id="_sport_type" value="1"></label>
                    <lable>or</lable>
                    <label>Basketball <input type="radio" name="_sport_type" id="_sport_type" value="2"></label>
                    <br>
                    <br>
                    <button class="eventSbmt" type="submit"> Create event </button>

                </form>
            </div>
        </div>
    </div>

    <div id='calendar'></div>

</body>



<script>
    //Render Fullcalendar with a php filter//
    var sport_type = '<?php echo $sport_type; ?>';
    document.addEventListener("DOMContentLoaded", () => {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            events: "Includes/fetch-event.php?type=" + sport_type,
            selectable: true,
            eventTimeFormat: {
                hour: 'numeric',
                minute: '2-digit',
                meridiem: false
            },
            select: function(start, end) {
                makeFormEvent(start, end);
            }
        });
        calendar.render();

    });


    //Popup functionality//
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("popupBtn");
    var span = document.getElementsByClassName("close")[0];
    btn.onclick = function() {
        modal.style.display = "block";
    }
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</html>