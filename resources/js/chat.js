var DateTime = luxon.DateTime;

let currentMessage = '';
let currentChat =
{
    messages: [
        {
            date: this.fakeDate_1(),
            message: 'Hai portato a spasso il cane?',
            status: 'sent'
        },
        {
            date: this.fakeDate_2(),
            message: 'Ricordati di stendere i panni',
            status: 'sent'
        },
        {
            date: this.fakeDate_3(),
            message: 'Tutto fatto!',
            status: 'received'
        }
    ],
};

function sendMessage() {
    let newMessage =
    {
        date: this.dateNow(),
        message: this.currentMessage,
        status: 'sent'
    }
    console.log(newMessage);
    this.currentChat.messages.push(newMessage)
    this.currentMessage = "";
    this.timeout = setTimeout(this.autoMessage, 1500)
}

function autoMessage() {
    let autoMessage =
    {
        date: this.dateNow(),
        message: 'You statistics today are awesome !',
        status: 'received'
    }
    this.currentChat.messages.push(autoMessage);
}

function dateNow() {
    let dt = DateTime.now();
    return dt.toLocaleString(DateTime.DATETIME_MED)
}

function fakeDate_1() {
    let dt = DateTime.local(2024, 3, 15, 10, 30)
    return dt.toLocaleString(DateTime.DATETIME_MED)
}

function fakeDate_2() {
    let dt = DateTime.local(2024, 3, 15, 10, 34)
    return dt.toLocaleString(DateTime.DATETIME_MED)
}

function fakeDate_3() {
    let dt = DateTime.local(2024, 3, 15, 11, 50)
    return dt.toLocaleString(DateTime.DATETIME_MED)
}

function fakeDate_4() {
    let dt = DateTime.local(2024, 3, 15, 13, 0)
    return dt.toLocaleString(DateTime.DATETIME_MED)
}