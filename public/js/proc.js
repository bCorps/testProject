var Ajax = {
    
    sendAjax : function(data){
        let format = {
            url: data._url,
            dataType: 'json',
            type: data._type,
            processData: false,
            contentType: false,
            
            success: data._success,
            error: data._error
        };

        if('_data' in data){
            format.data = data._data;
        }

        $.ajax(format);
    }
}