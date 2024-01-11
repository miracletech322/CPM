<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Das :attribute muss akzeptiert werden.',
    'active_url' => 'Das :attribute ist keine gültige URL.',
    'after' => 'Das :attribute muss ein Datum nach dem :date sein.',
    'after_or_equal' => 'Das :attribute muss ein Datum nach oder gleich :date sein.',
    'alpha' => 'Das :attribute darf nur Buchstaben enthalten.',
    'alpha_dash' => 'Das :attribute darf nur Buchstaben, Zahlen, Bindestriche und Unterstriche enthalten.',
    'alpha_num' => 'Das :attribute darf nur Buchstaben und Zahlen enthalten.',
    'array' => 'Das :attribute muss ein Array sein.',
    'before' => 'Das :attribute muss ein Datum vor dem :date sein.',
    'before_or_equal' => 'Das :attribute muss ein Datum vor oder gleich :date sein.',
    'between' => [
        'numeric' => 'Das :attribute muss zwischen :min und :max liegen.',
        'file' => 'Das :attribute muss zwischen :min und :max Kilobyte groß sein.',
        'string' => 'Das :attribute muss zwischen :min und :max Zeichen lang sein.',
        'array' => 'Das :attribute muss zwischen :min und :max Elemente enthalten.',
    ],
    'boolean' => 'Das :attribute Feld muss true oder false sein.',
    'confirmed' => 'Die :attribute Bestätigung stimmt nicht überein.',
    'date' => 'Das :attribute ist kein gültiges Datum.',
    'date_equals' => 'Das :attribute muss ein Datum gleich :date sein.',
    'date_format' => 'Das :attribute entspricht nicht dem Format :format.',
    'different' => 'Das :attribute und :other müssen unterschiedlich sein.',
    'digits' => 'Das :attribute muss :digits Ziffern enthalten.',
    'digits_between' => 'Das :attribute muss zwischen :min und :max Ziffern liegen.',
    'dimensions' => 'Das :attribute hat ungültige Bildabmessungen.',
    'distinct' => 'Das :attribute Feld hat einen doppelten Wert.',
    'email' => 'Das :attribute muss eine gültige E-Mail-Adresse sein.',
    'ends_with' => 'Das :attribute muss mit einem der folgenden Werte enden: :values.',
    'exists' => 'Das ausgewählte :attribute ist ungültig.',
    'file' => 'Das :attribute muss eine Datei sein.',
    'filled' => 'Das :attribute Feld muss einen Wert enthalten.',
    'gt' => [
        'numeric' => 'Das :attribute muss größer als :value sein.',
        'file' => 'Das :attribute muss größer als :value Kilobyte sein.',
        'string' => 'Das :attribute muss mehr als :value Zeichen enthalten.',
        'array' => 'Das :attribute muss mehr als :value Elemente enthalten.',
    ],
    'gte' => [
        'numeric' => 'Das :attribute muss größer oder gleich :value sein.',
        'file' => 'Das :attribute muss größer oder gleich :value Kilobyte sein.',
        'string' => 'Das :attribute muss größer oder gleich :value Zeichen sein.',
        'array' => 'Das :attribute muss :value Elemente oder mehr enthalten.',
    ],
    'image' => 'Das :attribute muss ein Bild sein.',
    'in' => 'Das ausgewählte :attribute ist ungültig.',
    'in_array' => 'Das :attribute Feld existiert nicht in :other.',
    'integer' => 'Das :attribute muss eine ganze Zahl sein.',
    'ip' => 'Das :attribute muss eine gültige IP-Adresse sein.',
    'ipv4' => 'Das :attribute muss eine gültige IPv4-Adresse sein.',
    'ipv6' => 'Das :attribute muss eine gültige IPv6-Adresse sein.',
    'json' => 'Das :attribute muss ein gültiger JSON-String sein.',
    'lt' => [
        'numeric' => 'Das :attribute muss kleiner als :value sein.',
        'file' => 'Das :attribute muss kleiner als :value Kilobyte sein.',
        'string' => 'Das :attribute muss weniger als :value Zeichen enthalten.',
        'array' => 'Das :attribute muss weniger als :value Elemente enthalten.',
    ],
    'lte' => [
        'numeric' => 'Das :attribute muss kleiner oder gleich :value sein.',
        'file' => 'Das :attribute muss kleiner oder gleich :value Kilobyte sein.',
        'string' => 'Das :attribute muss kleiner oder gleich :value Zeichen sein.',
        'array' => 'Das :attribute darf nicht mehr als :value Elemente enthalten.',
    ],
    'max' => [
        'numeric' => 'Das :attribute darf nicht größer als :max sein.',
        'file' => 'Das :attribute darf nicht größer als :max Kilobyte sein.',
        'string' => 'Das :attribute darf nicht größer als :max Zeichen sein.',
        'array' => 'Das :attribute darf nicht mehr als :max Elemente enthalten.',
    ],
    'mimes' => 'Das :attribute muss eine Datei des Typs :values sein.',
    'mimetypes' => 'Das :attribute muss eine Datei des Typs :values sein.',
    'min' => [
        'numeric' => 'Das :attribute muss mindestens :min sein.',
        'file' => 'Das :attribute muss mindestens :min Kilobyte groß sein.',
        'string' => 'Das :attribute muss mindestens :min Zeichen lang sein.',
        'array' => 'Das :attribute muss mindestens :min Elemente enthalten.',
    ],
    'multiple_of' => 'Das :attribute muss ein Vielfaches von :value sein.',
    'not_in' => 'Das ausgewählte :attribute ist ungültig.',
    'not_regex' => 'Das :attribute Format ist ungültig.',
    'numeric' => 'Das :attribute muss eine Zahl sein.',
    'password' => 'Das Passwort ist ungültig.',
    'present' => 'Das :attribute Feld muss vorhanden sein.',
    'regex' => 'Das :attribute Format ist ungültig.',
    'required' => 'Das :attribute Feld ist erforderlich.',
    'required_if' => 'Das :attribute Feld ist erforderlich, wenn :other :value ist.',
    'required_unless' => 'Das :attribute Feld ist erforderlich, es sei denn, :other ist in :values enthalten.',
    'required_with' => 'Das :attribute Feld ist erforderlich, wenn :values vorhanden ist.',
    'required_with_all' => 'Das :attribute Feld ist erforderlich, wenn :values vorhanden sind.',
    'required_without' => 'Das :attribute Feld ist erforderlich, wenn :values nicht vorhanden ist.',
    'required_without_all' => 'Das :attribute Feld ist erforderlich, wenn keine der :values vorhanden ist.',
    'same' => 'Das :attribute und :other müssen übereinstimmen.',
    'size' => [
        'numeric' => 'Das :attribute muss :size sein.',
        'file' => 'Das :attribute muss :size Kilobyte groß sein.',
        'string' => 'Das :attribute muss :size Zeichen lang sein.',
        'array' => 'Das :attribute muss :size Elemente enthalten.',
    ],
    'starts_with' => 'Das :attribute muss mit einem der folgenden Werte beginnen: :values.',
    'string' => 'Das :attribute muss eine Zeichenkette sein.',
    'timezone' => 'Das :attribute muss eine gültige Zeitzone sein.',
    'unique' => 'Das :attribute wurde bereits verwendet.',
    'uploaded' => 'Das :attribute konnte nicht hochgeladen werden.',
    'url' => 'Das :attribute Format ist ungültig.',
    'uuid' => 'Das :attribute muss eine gültige UUID sein.',
    'numericarray' => 'Alle :attribute müssen numerische Werte sein.',
    'numeric_id' => 'Alle :attribute sind erforderlich.',
    'numeric_comma' => 'Das :attribute muss eine Zahl sein.',
    'numeric_comma' => 'Das :attribute muss eine Zahl sein.',
    'serial' => 'Das :attribute muss 12 Zeichen haben und das Format XXX-XXX-XXXX haben.',
    
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
