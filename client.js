/**
 *
 * @param id
 * @param timestamp
 */
function readContent(id, timestamp)
{

    var queryString = {'timestamp': timestamp, 'id': id};

    $.get('reader.php', queryString, function (response) {
        var data = jQuery.parseJSON(response);
        if (data.content) {
            if (data.content.forEach) {
                data.content.forEach(function (message) {
                    $('#response').append('<div>' + message + '</div>');
                });
            }
        }
        // reconecta ao receber uma resposta do servidor
        readContent(id, data.timestamp);
    });
}

function writeContent(id, message)
{
    var data = {
        'id': id,
        'message': message
    };
    $.post('writer.php', data);
}

