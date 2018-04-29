/**
 * AJAX long-polling
 *
 * 1. sends a request to the server (without a timestamp parameter)
 * 2. waits for an answer from server.php (which can take forever)
 * 3. if server.php responds (whenever), put data_from_file into #response
 * 4. and call the function again
 *
 * @param timestamp
 */
function getContent(timestamp)
{
    var queryString = {'timestamp' : timestamp};


    $.ajax({
        type: 'GET',
        url: 'http://46.101.6.112/datapush/server/server.php',
        data: queryString,
        success: function(data){
            var obj = jQuery.parseJSON(data);
            $('#countOfUsers').html(obj.data_from_db);
            getContent(obj.timestamp);
        }
    });
}

$(function() {
    getContent();
});