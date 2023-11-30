refresh();

function refresh()
{
    var loadingAlert = talert("Keys","Loading Keys..","stop");

    var moreLoadingAlert = setTimeout(function() {
        talert("Keys", "Loading is taking longer than expected. Please wait a bit more...", "stop");
    }, 5000);
    
    $.post("generate_key.php", function(response) {
        $('.key_box').each(function() {
        var el = $(this);
        el.css('animation', 'none');
        talert("Keys","New Keys Uploaded!");
        setTimeout(function() {
                el.css('animation', 'textareaanim-refresh 1s ease-in-out forwards');
            }, 10); // Bu, animasyonun sıfırlanmasını ve yeniden başlamasını sağlar
        }); 
        var keys = JSON.parse(response);
        $('textarea[name="privateKey"]').val(keys.privateKey);
        $('textarea[name="publicKey"]').val(keys.publicKey);
        if(loadingAlert)
        {
            loadingAlert.close();
        }
        clearTimeout(moreLoadingAlert);
    })
    .fail(function () {
        if(loadingAlert)
        {
            loadingAlert.close();
        }
        clearTimeout(moreLoadingAlert);
    });
}

function copyKey(element)
{
    var textArea = element.querySelector('.key_box');

    const copiedContent = textArea.value.trim();
    navigator.clipboard.writeText(copiedContent);

    var key_type = textArea.name;

    if(key_type == "privateKey")
    {
        talert("Copy Key","Private Key Copied!","");
    }
    if(key_type == "publicKey")
    {
        talert("Copy Key","Public Key Copied!","");
    }
}

function talert(title,text,time)
{
    const alertBox = document.getElementById("alertBox");
    const alertTitle = document.getElementById("alertTitle");
    const alertText = document.getElementById("alertText");

    alertTitle.innerText = title;
    alertText.innerText = text;

    alertBox.classList.remove("active");
    setTimeout(function () {
        alertBox.classList.add("active");
    },150);
    if(time != "stop")
    {
        setTimeout(function () {
            alertBox.classList.remove("active");
        },2000);
    }
}

function quest()
{
    const questBox = document.getElementById("questBox");
    const privacyBox = document.getElementById("privacyBox");

    privacyBox.classList.remove("active");
    questBox.classList.add("active");
}
function closeQuest()
{
    const questBox = document.getElementById("questBox");
    const privacyBox = document.getElementById("privacyBox");
    
    questBox.classList.remove("active");
}

function privacy()
{
    const questBox = document.getElementById("questBox");
    const privacyBox = document.getElementById("privacyBox");

    privacyBox.classList.add("active");
    questBox.classList.remove("active");
}
function closePrivacy()
{
    const questBox = document.getElementById("questBox");
    const privacyBox = document.getElementById("privacyBox");
    
    privacyBox.classList.remove("active");
}