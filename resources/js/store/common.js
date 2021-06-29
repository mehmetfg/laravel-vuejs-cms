
const state={

    devices:['QUIT 1', 'QUIT 2', 'QUIT 3', 'Tomatis', 'ONDAMED'],
    reasons:[
        {value:1, name:'Görevler',color:'#4285f4'},
        {value:2, name:'Hatirlatici',color:'#3f51b5'},
        {value:3, name:'Neo Terapi Gorusme',color:'#f6bf26'},
        {value:4, name:'Psikoloji',color:'#ad1457'},
        {value:5, name:'Psikoloji Quit',color:'#d50000'},
        {value:6, name:'Quit',color:'#0b8043'},
        {value:7, name:'Sigara takip',color:'#f4511e'},
        {value:8, name:'Tomatis',color:'#039be5'}
    ],
    reasons1:[
        {value:1,  name:'Sigara',color:'Red', selectedItem:'selected'},
        {value:2, name:'Alkol',color:'Blue', selectedItem:false},
        {value:3, name:'Kilo',color:'Orange', selectedItem:false},
        {value:4, name:'QUIT 1',color:'Green', selectedItem:false},
        {value:5, name:'QUIT 2',color:'Green', selectedItem:false},
        {value:6, name:'QUIT 3',color:'Green', selectedItem:false},
        {value:14, name:'Neoterapi Görüşmesi',color:'Orange', selectedItem:false},
        {value:7, name:'Tomatis',color:'Gray', selectedItem:false},
        {value:8, name:'Ondamed',color:'Blue', selectedItem:false},
        {value:9, name:'Psikoloji Quit',color:'Red', selectedItem:false},
        {value:10, name:'Görevler',color:'Red', selectedItem:false},
        {value:11, name:'Hatırlatıcılar',color:'Red', selectedItem:false},
        {value:12, name:'Psikoloji',color:'Red', selectedItem:false},
        {value:13, name:'Seminerler',color:'Red', selectedItem:false},
        {value:14, name:'Zayiflama ön görusmesi',color:'blue', selectedItem:false},
        {value:15, name:'Sigara öngorusmesi',color:'blue', selectedItem:false},

    ],
    assayTypes: ['Kan Tahlili', 'İdrar Tahlili'],
    assayStatus:['Geldi', 'Gelecek', 'İstendi'],
        cities:{
        "1": "ADANA",
        "2": "ADIYAMAN",
        "3": "AFYONKARAHİSAR",
        "4": "AĞRI",
        "5": "AMASYA",
        "6": "ANKARA",
        "7": "ANTALYA",
        "8": "ARTVİN",
        "9": "AYDIN",
        "10": "BALIKESİR",
        "11": "BİLECİKK",
        "12": "BİNGÖL",
        "13": "BİTLİS",
        "14": "BOLU",
        "15": "BURDUR",
        "16": "BURSA",
        "17": "ÇANAKKALE",
        "18": "ÇANKIRI",
        "19": "ÇORUM",
        "20": "DENİZLİ",
        "21": "DİYARBAKIR",
        "22": "EDİRNE",
        "23": "ELAZIĞ",
        "24": "ERZİNCAN",
        "25": "ERZURUM",
        "26": "ESKİŞEHİR",
        "27": "GAZİANTEP",
        "28": "GİRESUN",
        "29": "GÜMÜŞHANE",
        "30": "HAKKARİ",
        "31": "HATAY",
        "32": "ISPARTA",
        "33": "MERSİN",
        "34": "İSTANBUL",
        "35": "İZMİR",
        "36": "KARS",
        "37": "KASTAMONU",
        "38": "KAYSERİ",
        "39": "KIRKLARELİ",
        "40": "KIRŞEHİR",
        "41": "KOCAELİ",
        "42": "KONYA",
        "43": "KÜTAHYA",
        "44": "MALATYA",
        "45": "MANİSA",
        "46": "KAHRAMANMARAŞ",
        "47": "MARDİN",
        "48": "MUĞLA",
        "49": "MUŞ",
        "50": "NEVŞEHİR",
        "51": "NİĞDE",
        "52": "ORDU",
        "53": "RİZE",
        "54": "SAKARYA",
        "55": "SAMSUN",
        "56": "SİİRT",
        "57": "SİNOP",
        "58": "SİVAS",
        "59": "TEKİRDAĞ",
        "60": "TOKAT",
        "61": "TRABZON",
        "62": "TUNCELİ",
        "63": "ŞANLIURFA",
        "64": "UŞAK",
        "65": "VAN",
        "66": "YOZGAT",
        "67": "ZONGULDAK",
        "68": "AKSARAY",
        "69": "BAYBURT",
        "70": "KARAMAN",
        "71": "KIRIKKALE",
        "72": "BATMAN",
        "73": "ŞIRNAK",
        "74": "BARTIN",
        "75": "ARDAHAN",
        "76": "IĞDIR",
        "77": "YALOVA",
        "78": "KARABüK",
        "79": "KİLİS",
        "80": "OSMANİYE",
        "81": "DÜZCE"
    },
    appointStatus:{
        "1":"Gelecek",
        "2":"iptal",
        "3":"Aranacak",


    },
    currentType:{
        "1":"Borç",
        "2":"Alacak"
    },
    // Common Labels for both calendars
    calendarLabels: [
        { text: 'Business' ,value : 'business', color: 'success' },
        { text: 'Work', value: 'work', color: 'warning'},
        { text: 'Personal', value: 'personal', color: 'danger'},
    ],

    calendarEvents: [
        {
            id: 1,
            title: 'My Event',
            start: new Date(new Date() - 1000 * 60 * 60 * 24 * 3),
            end: new Date(new Date() - 1000 * 60 * 60 * 24 * 2),
            desc: 'demo event',
            cssClass: 'event-success',
            label: 'business'
        },
    ],

    // Simple Calendar State
    simpleCalendarEvents: [
        {
            id: 1,
            title: 'My Event',
            startDate: new Date(new Date() - 1000 * 60 * 60 * 24 * 3),
            endDate: new Date(new Date() - 1000 * 60 * 60 * 24 * 2),
            url: '',
            classes: 'event-success',
            label: 'business'
        },
    ]

};






    const getters={

        devices(state){

            return state.devices
        },
        reasons(state){

            return state.reasons
        },
        assayTypes(state){

            return state.assayTypes
        },
        assayStatus(state){

            return state.assayStatus
        },
        cities(state){

            return state.cities
        },
        appointStatus(state){

            return state.appointStatus
        },
        currentType(state){

            return state.currentType
        }

};
    const  mutations={

    };
        const actions={


}
export  default {
            state,
    mutations,
    getters,
    actions
}
