
// langue avec <html lang="?">
var mlCodes = [
        {
        code: "fr",
        name: "fr" },
        {
        code: "en",
        name: "en"}
    ];

// valeur a changer en fonction de la langue :
var MLstrings = [
    // HEADER
    {
        fr: "Accueil",
        en: "Home" 
    },
    {
        fr: "Ajouter une soirée",
        en: "Add a party" 
    },
    {
        fr: "Mon profil",
        en: "My profile" 
    },
    {
        fr: "Déconnexion",
        en: "Disconnect" 
    },
    {
        fr: "Connexion",
        en: "Connection" 
    },
    {
        fr: "Créer un compte",
        en: "Create an account" 
    },

    // BASE
    {
        fr: "Trier par :",
        en: "Order By :" 
    },
    {
        fr: "Soirées à venir",
        en: "Partys to come" 
    },
    {
        fr: "Soirées passées",
        en: "Past partys" 
    },
    {
        fr: "Toutes",
        en: "All" 
    },
    {
        fr: "Mes soirées",
        en: "My partys" 
    },
    {
        fr: "Mes favoris",
        en: "My favourites" 
    },
    {
        fr: "Rechercher une annonce :",
        en: "Search a party :" 
    },
    {
        fr: "Rechercher",
        en: "Search" 
    },
    {
        fr: "Plus de détails",
        en: "More details" 
    },

    // DETAILS
    {
        fr: "Participer",
        en: "Go to it" 
    },

    //LOGIN // INPUT
    {
        fr: "Connexion",
        en: "Connection" 
    },
    {
        fr: "Mot de passe :",
        en: "Password :" 
    },
    {
        fr: "Vous n'avez pas encore de compte ?",
        en: "Do not have an account yet ?" 
    },
    {
        fr: "Vous avez oublié votre mot de passe ?",
        en: "Forgot your password ?" 
    },

    // SIGNIN // INPUT
    {
        fr: "Créer mon compte",
        en: "Create my account" 
    },
    {
        fr: "Vous avez déjà un compte ?",
        en: "Already have an account ?" 
    },

    // EDIT // INPUT
    {
        fr: "Modifier les informations",
        en: "Edit my informations" 
    },
    {
        fr: "Nom :",
        en: "Name :" 
    },
    {
        fr: "Prénom :",
        en: "First name :" 
    },

    // SELECT DATE
    {
        fr: "Date de naissance :",
        en: "Date of birth :" 
    },
    {
        fr: "Jour",
        en: "Day" 
    },
    {
        fr: "Mois",
        en: "Month" 
    },
    {
        fr: "Année",
        en: "Year" 
    },
    {
        fr: "Janvier",
        en: "January" 
    },
    {
        fr: "Fevrier",
        en: "February" 
    },
    {
        fr: "Mars",
        en: "March" 
    },
    {
        fr: "Avril",
        en: "April" 
    },
    {
        fr: "Mai",
        en: "May" 
    },
    {
        fr: "Juin",
        en: "June" 
    },
    {
        fr: "Juillet",
        en: "July" 
    },
    {
        fr: "Août",
        en: "August" 
    },
    {
        fr: "Septembre",
        en: "September" 
    },
    {
        fr: "Octobre",
        en: "October" 
    },
    {
        fr: "Novembre",
        en: "November" 
    },
    {
        fr: "Décembre",
        en: "December" 
    },

    // HEURE
    {
        fr: "Heure",
        en: "Hour" 
    },

    // RADIO SEXE
    {
        fr: "Sexe :",
        en: "Gender :" 
    },
    {
        fr: "Homme",
        en: "Man" 
    },
    {
        fr: "Femme",
        en: "Woman" 
    },
    {
        fr: "Autre",
        en: "Other" 
    },

    // EDIT PROFIL 
    {
        fr: "Modifier le mot de passe",
        en: "Edit the password" 
    },
    {
        fr: "Mot de passe actuel :",
        en: "Current password :" 
    },
    {
        fr: "Mot de passe :",
        en: "Password :" 
    },
    {
        fr: "Confirmer :",
        en: "Confirm :" 
    },

    // PROFIL
    {
        fr: "Diagramme de l'activité",
        en: "Activity diagram" 
    },
    {
        fr: "Participation :",
        en: "Took part :" 
    },
    {
        fr: "Organisation :",
        en: "Organized :" 
    },
    {
        fr: "Banni :",
        en: "Banned :" 
    },
    {
        fr: "Voir la liste",
        en: "See the list" 
    },

    // ADD
    {
        fr: "Créer une soirée",
        en: "Create a party" 
    },
    {
        fr: "Ville :",
        en: "City :" 
    },
    {
        fr: "Adresse :",
        en: "Adress :" 
    },
    {
        fr: "Prix :",
        en: "Price :" 
    },
    {
        fr: "Places :",
        en: "Slots :" 
    },
    {
        fr: "Organisateur :",
        en: "Promoter :" 
    },
    {
        fr: "Image :",
        en: "Picture :" 
    },
    {
        fr: "Je veux pouvoir refuser des gens",
        en: "I want to be able to refuse someone" 
    },

    //FORGOT
    {
        fr: "Réinitialiser le mot de passe",
        en: "Reset the password" 
    },
    {
        fr: "Oubli du mot de passe",
        en: "Forgot the password" 
    },
    {
        fr: "Réinitialiser",
        en: "Reset" 
    },
    {
        fr: "Envoyer",
        en: "Send" 
    },

    // CONTACT
    {
        fr: "Nom et prénom :",
        en: "Name and first name :" 
    },
    {
        fr: "Sujet :",
        en: "Topic :" 
    },

    //FOOTER 
    {
        fr: "Mentions légales",
        en: "Legal notices" 
    },
    {
        fr: "Site du particulier",
        en: "Individual's website" 
    },
    {
        fr: "Utilisation de cookies",
        en: "Use of cookies" 
    },
    {
        fr: "Utilisation de données personelles",
        en: "Use of personal data" 
    },
    {
        fr: "Réseaux sociaux",
        en: "Social media" 
    },
    {
        fr: "Changer la langue",
        en: "Switch language" 
    },

    // SUCCESS
    {
        fr: "Le message nous a bien été transmis et nous vous en remercions. Nous allons y donner suite dans les meilleurs délais.",
        en: "We've received your message and thank you for that. We will follow up as soon as possible."
    },
    {
        fr: "Nous vous avons envoyé un mail pour réinitialiser votre mot de passe.",
        en: "We've sent you an email to reset your password."
    },
    {
        fr: "Le mot de passe a bien été réinitialisé.",
        en: "Your password has been reset."
    },
    {
        fr: "Informations modfiées avec succes.",
        en: "Informations edited successfully."
    },
    {
        fr: "Mot de passe modfié avec succes.",
        en: "Password edited successfully."
    },
    {
        fr: "Nous avons enregistré votre inscription. Votre place vous a été envoyé par email.",
        en: "We have registered your registration. Your place has been emailed to you."
    },
    // ERRORS
    {
        fr: "Mot de passe incorrect",
        en: "Incorrect password"
    },
    {
        fr: "Email inconnu",
        en: "Unknown email"
    },
    {
        fr: "Il faut remplir tout les champs",
        en: "Please fill in the fields"
    },
    {
        fr: "Email déjà utilisé",
        en: "Email already used"
    },
    {
        fr: "Le mot de passe doit être composé d'au moins 8 caractères",
        en: "The password must be at least 8 characters long"
    },
    {
        fr: "Le mot de passe doit être composé d'au moins 1 minuscule",
        en: "The password must be composed of at least 1 lowercase"
    },
    {
        fr: "Le mot de passe doit être composé d'au moins 1 majuscule",
        en: "The password must be composed of at least 1 uppercase"
    },
    {
        fr: "La confirmation est fausse",
        en: "Wrong confirmation"
    },
    {
        fr: "Temps écoulé. Il faut reformuler une requête",
        en: "Time has elapsed. You have to rephrase a request"
    },
    {
        fr: "Erreur. Il faut reformuler une requête",
        en: "Error. You must rephrase a request"
    },
    {
        fr: "Le nom doit être composé uniquement de lettres et de moins de 50 caractères",
        en: "The name must consist only of letters and less than 50 characters"
    },
    {
        fr: "Le prénom doit être composé uniquement de lettres et de moins de 50 caractères",
        en: "The first name must be composed only of letters and less than 50 characters"
    },
    {
        fr: "Le jour de naissance doit être entre 1 et 31",
        en: "The day of birth must be between 1 and 31"
    },
    {
        fr: "Le mois de naissance doit être entre 1 et 12",
        en: "The month of birth must be between 1 and 12"
    },
    {
        fr: "L'année de naissance doit être entre 1950 et 2020",
        en: "The year of birth must be between 1950 and 2020"
    },
    {
        fr: "Fevrier ne comporte que 28 ou 29 jours",
        en: "February only has 28 or 29 days"
    },
    {
        fr: "L'age ne peut pas etre nul",
        en: "Age cannot be zero"
    },
    {
        fr: "Le sexe doit être 'homme', 'femme' ou 'autre' et composé uniquement de lettres",
        en: "The sex must be 'man', 'woman' or 'other' and composed only of letters"
    },
    {
        fr: "L'email doit être composé de moins de 50 caractères, un '@' et un '.'",
        en: "The email must be less than 50 characters long, an '@' and a '.'"
    },
    {
        fr:  "Le mot de passe doit être composé de moins de 255 caractères",
        en: "The password must be less than 255 characters long"
    },
    {
        fr:  "Aucun résultat",
        en: "No result"
    },
    {
        fr:  "Le nom doit être composé uniquement de lettres et de chiffres et de moins de 50 caractères",
        en: "Name must consist only of letters and numbers and less than 50 characters"
    },
    {
        fr:  "La ville doit être composée uniquement de lettres et de moins de 50 caractères",
        en: "City must be composed only of letters and less than 50 characters"
    },
    {
        fr:  "L'adresse doit être composée uniquement de lettres et de chiffres et de moins de 50 caractères",
        en: "The address must be composed only of letters and numbers and less than 50 characters"
    },
    {
        fr:  "La description doit être composée de moins de 1024 caractères",
        en: "Description must be less than 1024 characters"
    },
    {
        fr:  "Le prix doit être supérieur ou égal à 0",
        en: "Price must be greater than or equal to 0"
    },
    {
        fr:  "Le nombre de place doit être supérieur à 0",
        en: "The number of places must be greater than 0"
    },
    {
        fr:  "L'organisateur doit être composé uniquement de lettres et de chiffres et de moins de 50 caractères",
        en: "The organizer must be composed only of letters and numbers and less than 50 characters"
    },
    {
        fr:  "Le jour doit être entre 1 et 31",
        en: "The day must be between 1 and 31"
    },
    {
        fr:  "Le mois doit être entre 1 et 12",
        en: "The month must be between 1 and 12"
    },
    {
        fr:  "L'année doit être entre 2020 et 2029",
        en: "The year must be between 2020 and 2029"
    },
    {
        fr:  "L'heure doit être entre 1 et 23",
        en: "Time must be between 1 and 23"
    },
    {
        fr:  "Les minutes doivent être entre 0 et 59",
        en: "Minutes must be between 0 and 59"
    },
    {
        fr:  "'party' doit être un nombre",
        en: "'party' must be a number"
    },
    {
        fr:  "Vous devez être connecté",
        en: "You must be logged in"
    },
];

var mlrLangInUse;

var mlr = function (_a) {
    var _b = _a === void 0 ? {} : _a,_c = _b.dropID,dropID = _c === void 0 ? "mbPOCControlsLangDrop" : _c,_d = _b.stringAttribute,stringAttribute = _d === void 0 ? "data-mlr-text" : _d,_e = _b.chosenLang,chosenLang = _e === void 0 ? "English" : _e,_f = _b.mLstrings,mLstrings = _f === void 0 ? MLstrings : _f,_g = _b.countryCodes,countryCodes = _g === void 0 ? false : _g,_h = _b.countryCodeData,countryCodeData = _h === void 0 ? [] : _h;
    
    var root = document.documentElement;
    var listOfLanguages = Object.keys(mLstrings[0]);
    mlrLangInUse = chosenLang;

    (function createMLDrop() {
        var mbPOCControlsLangDrop = document.getElementById(dropID);
        
        // vide le select
        mbPOCControlsLangDrop.innerHTML = "";

        // remplit select avec liste des langues possibles
        listOfLanguages.forEach(function (lang, langidx) {
            var HTMLoption = document.createElement("option");
            HTMLoption.value = lang;
            if (lang == 'en') { 
                HTMLoption.textContent = 'English';
            } else {
                HTMLoption.textContent = 'Français';
            }
            mbPOCControlsLangDrop.appendChild(HTMLoption);
            if (lang === chosenLang) {
                mbPOCControlsLangDrop.value = lang;
            }
        });

        // change les balises où il y a l'attribut data-mlr-text
        resolveAllMLStrings();
        // change l'attribut lang dans la balise html
        $('html').attr('lang', lang_name);
    })();


    // edit langue
    function resolveAllMLStrings() {
        var stringsToBeResolved = document.querySelectorAll("[" + stringAttribute + "]");
        stringsToBeResolved.forEach(function (stringToBeResolved) {
            var originaltextContent = stringToBeResolved.textContent;
            var resolvedText = resolveMLString(originaltextContent, mLstrings);
            stringToBeResolved.textContent = resolvedText;
        });
    }
};


function resolveMLString(stringToBeResolved, mLstrings) {
    var matchingStringIndex = mLstrings.find(function (stringObj) {
        // Create an array of the objects values:
        var stringValues = Object.values(stringObj);
        // Now return if we can find that string anywhere in there
        return stringValues.includes(stringToBeResolved);
    });

    if (matchingStringIndex) { // Si correspond : en anglais
        return matchingStringIndex[mlrLangInUse];
    } else { // Si rien correspond : en français
        return stringToBeResolved;
    }
}

mlr({
    dropID: "mbPOCControlsLangDrop", // id du select pour changer la langue
    stringAttribute: "data-mlr-text", // attribut a ajouter aux balises a modifier 
    chosenLang: lang_name, //langue par defaut
    mLstrings: MLstrings,  // table des strings a changer 
    countryCodeData: mlCodes //tableau des <html lang="fr"> avec langue possibles
});
