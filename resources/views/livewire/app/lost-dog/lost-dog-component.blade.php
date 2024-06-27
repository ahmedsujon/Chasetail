<div>
    @push('styles')
        <link href="{{ asset('assets/app/css/select2.min.css') }}" rel="stylesheet" />
    @endpush
    <!-- Side bar -->
    <div class="side-bar">
        <div class="close-btn">
            <i class="fas fa-times"></i>
        </div>
        <div class="menu">
            <div class="item"><a href="index.html"><i class="fas fa-desktop"></i>Home</a></div>
            <div class="item">
                <a class="sub-btn"><i class="fas fa-table"></i>About<i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                    <a href="#" class="sub-item">Sub Item 01</a>
                    <a href="#" class="sub-item">Sub Item 02</a>
                    <a href="#" class="sub-item">Sub Item 03</a>
                </div>
            </div>
            <div class="item">
                <a class="sub-btn"><i class="fas fa-cogs"></i>Partners<i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                    <a href="#" class="sub-item">Sub Item 01</a>
                    <a href="#" class="sub-item">Sub Item 02</a>
                </div>
            </div>
            <div class="item"><a href="#"><i class="fas fa-info-circle"></i>Pricing</a></div>
        </div>
    </div>

    <!-- Banner -->
    <section id="page-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="page-header-text">
                        <h4>Showing all dogs near you</h4>
                        {{-- <p>Showing results within 10 miles</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Page Content -->
    <section class="lost-dog-list-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="lost-dog-list-left">
                        <form>
                            <h4>Filters <span> <a href="#">Reset
                                        Filters</a></span></h4>
                            <h5>Location</h5>

                            {{-- <div class="location-left">
                                <input class="form-control form-location" id="location_address" name="location_address"
                                    autocomplete="off" type="text" placeholder="Found near (address or zip)">
                            </div>
                            <div class="current-location">
                                <p><a onclick="getCurrentLocation();">Use current location</a></p>
                            </div> --}}

                            <div class="form-floating">
                                <input type="text" class="form-control" id="address" name="address"
                                    autocomplete="off" placeholder="Found near (address or zip)"
                                    wire:model.live="searchByAddressTerm" wire:keyup='resetPage'>
                                <label for="floatingInputValue">Found near (address or zip)</label>
                            </div>

                            <div class="current-location">
                                <p><a onclick="getCurrentLocation();">Use current location</a></p>
                            </div>

                            <div class="search-radius">
                                <label for="formControlRange" class="form-label">Search Radius</label>
                                <input type="range" class="form-control-range" id="formControlRange"
                                    onInput="$('#rangeval').html($(this).val())">
                                <span id="rangeval">50<!-- Default value -->
                                </span> Miles
                            </div>

                            <div class="myselect">
                                <select wire:model.live="searchByGenderTerm" class="form-select">
                                    <option selected value="">Sex</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Unknown">Unknown</option>
                                </select>
                            </div>

                            <div class="myselect">
                                <select class="form-select">
                                    <option selected>Bread</option>
                                    <option value="ENGLISH POINTER">ENGLISH POINTER</option>
                                    <option value="ENGLISH SETTER">ENGLISH SETTER</option>
                                    <option value="KERRY BLUE TERRIER">KERRY BLUE TERRIER</option>
                                    <option value="CAIRN TERRIER">CAIRN TERRIER</option>
                                    <option value="ENGLISH COCKER SPANIEL">ENGLISH COCKER SPANIEL</option>
                                    <option value="GORDON SETTER">GORDON SETTER</option>
                                    <option value="AIREDALE TERRIER">AIREDALE TERRIER</option>
                                    <option value="AUSTRALIAN TERRIER">AUSTRALIAN TERRIER</option>
                                    <option value="BEDLINGTON TERRIER">BEDLINGTON TERRIER</option>
                                    <option value="BORDER TERRIER">BORDER TERRIER</option>
                                    <option value="BULL TERRIER">BULL TERRIER</option>
                                    <option value="FOX TERRIER (SMOOTH)">FOX TERRIER (SMOOTH)</option>
                                    <option value="ENGLISH TOY TERRIER (BLACK &TAN)">ENGLISH TOY TERRIER (BLACK & TAN)
                                    </option>
                                    <option value="SWEDISH VALLHUND">SWEDISH VALLHUND</option>
                                    <option value="BELGIAN SHEPHERD DOG">BELGIAN SHEPHERD DOG</option>
                                    <option value="OLD ENGLISH SHEEPDOG">OLD ENGLISH SHEEPDOG</option>
                                    <option value="GRIFFON NIVERNAIS">GRIFFON NIVERNAIS</option>
                                    <option value="BRIQUET GRIFFON VENDEEN">BRIQUET GRIFFON VENDEEN</option>
                                    <option value="ARIEGEOIS">ARIEGEOIS</option>
                                    <option value="GASCON SAINTONGEOIS">GASCON SAINTONGEOIS</option>
                                    <option value="GREAT GASCONY BLUE">GREAT GASCONY BLUE</option>
                                    <option value="POITEVIN">POITEVIN</option>
                                    <option value="BILLY">BILLY</option>
                                    <option value="ARTOIS HOUND">ARTOIS HOUND</option>
                                    <option value="PORCELAINE">PORCELAINE</option>
                                    <option value="SMALL BLUE GASCONY">SMALL BLUE GASCONY</option>
                                    <option value="BLUE GASCONY GRIFFON">BLUE GASCONY GRIFFON</option>
                                    <option value="GRAND BASSET GRIFFON VENDEEN">GRAND BASSET GRIFFON VENDEEN</option>
                                    <option value="NORMAN ARTESIEN BASSET">NORMAN ARTESIEN BASSET</option>
                                    <option value="BLUE GASCONY BASSET">BLUE GASCONY BASSET</option>
                                    <option value="BASSET FAUVE DE BRETAGNE">BASSET FAUVE DE BRETAGNE</option>
                                    <option value="PORTUGUESE WATER DOG">PORTUGUESE WATER DOG</option>
                                    <option value="WELSH CORGI (CARDIGAN)">WELSH CORGI (CARDIGAN)</option>
                                    <option value="WELSH CORGI (PEMBROKE)">WELSH CORGI (PEMBROKE)</option>
                                    <option value="IRISH SOFT COATED WHEATEN TERRIER">IRISH SOFT COATED WHEATEN TERRIER
                                    </option>
                                    <option value="YUGOSLAVIAN SHEPHERD DOG - SHARPLANINA">YUGOSLAVIAN SHEPHERD DOG -
                                        SHARPLANINA</option>
                                    <option value="JÃ„MTHUND">JÄMTHUND</option>
                                    <option value="BASENJI">BASENJI</option>
                                    <option value="BEAUCE SHEEPDOG">BEAUCE SHEEPDOG</option>
                                    <option value="BERNESE MOUNTAIN DOG">BERNESE MOUNTAIN DOG</option>
                                    <option value="APPENZELL CATTLE DOG">APPENZELL CATTLE DOG</option>
                                    <option value="ENTLEBUCH CATTLE DOG">ENTLEBUCH CATTLE DOG</option>
                                    <option value="KARELIAN BEAR DOG">KARELIAN BEAR DOG</option>
                                    <option value="FINNISH SPITZ">FINNISH SPITZ</option>
                                    <option value="NEWFOUNDLAND">NEWFOUNDLAND</option>
                                    <option value="FINNISH HOUND">FINNISH HOUND</option>
                                    <option value="POLISH HOUND">POLISH HOUND</option>
                                    <option value="KOMONDOR">KOMONDOR</option>
                                    <option value="KUVASZ">KUVASZ</option>
                                    <option value="PULI">PULI</option>
                                    <option value="PUMI">PUMI</option>
                                    <option value="HUNGARIAN SHORT-HAIRED POINTER (VIZSLA)">HUNGARIAN SHORT-HAIRED
                                        POINTER (VIZSLA)</option>
                                    <option value="GREAT SWISS MOUNTAIN DOG">GREAT SWISS MOUNTAIN DOG</option>
                                    <option value="SWISS HOUND">SWISS HOUND</option>
                                    <option value="SMALL SWISS HOUND">SMALL SWISS HOUND</option>
                                    <option value="ST. BERNARD">ST. BERNARD</option>
                                    <option value="COARSE-HAIRED STYRIAN HOUND">COARSE-HAIRED STYRIAN HOUND</option>
                                    <option value="AUSTRIAN BLACK AND TAN HOUND">AUSTRIAN BLACK AND TAN HOUND</option>
                                    <option value="AUSTRIAN PINSCHER">AUSTRIAN PINSCHER</option>
                                    <option value="MALTESE">MALTESE</option>
                                    <option value="FAWN BRITTANY GRIFFON">FAWN BRITTANY GRIFFON</option>
                                    <option value="PETIT BASSET GRIFFON VENDEEN">PETIT BASSET GRIFFON VENDEEN</option>
                                    <option value="TYROLEAN HOUND">TYROLEAN HOUND</option>
                                    <option value="LAKELAND TERRIER">LAKELAND TERRIER</option>
                                    <option value="MANCHESTER TERRIER">MANCHESTER TERRIER</option>
                                    <option value="NORWICH TERRIER">NORWICH TERRIER</option>
                                    <option value="SCOTTISH TERRIER">SCOTTISH TERRIER</option>
                                    <option value="SEALYHAM TERRIER">SEALYHAM TERRIER</option>
                                    <option value="SKYE TERRIER">SKYE TERRIER</option>
                                    <option value="STAFFORDSHIRE BULL TERRIER">STAFFORDSHIRE BULL TERRIER</option>
                                    <option value="CONTINENTAL TOY SPANIEL">CONTINENTAL TOY SPANIEL</option>
                                    <option value="WELSH TERRIER">WELSH TERRIER</option>
                                    <option value="GRIFFON BRUXELLOIS">GRIFFON BRUXELLOIS</option>
                                    <option value="GRIFFON BELGE">GRIFFON BELGE</option>
                                    <option value="PETIT BRABANÇON">PETIT BRABANÇON</option>
                                    <option value="SCHIPPERKE">SCHIPPERKE</option>
                                    <option value="BLOODHOUND">BLOODHOUND</option>
                                    <option value="WEST HIGHLAND WHITE TERRIER">WEST HIGHLAND WHITE TERRIER</option>
                                    <option value="YORKSHIRE TERRIER">YORKSHIRE TERRIER</option>
                                    <option value="CATALAN SHEEPDOG">CATALAN SHEEPDOG</option>
                                    <option value="SHETLAND SHEEPDOG">SHETLAND SHEEPDOG</option>
                                    <option value="IBIZAN PODENCO">IBIZAN PODENCO</option>
                                    <option value="BURGOS POINTING DOG">BURGOS POINTING DOG</option>
                                    <option value="SPANISH MASTIFF">SPANISH MASTIFF</option>
                                    <option value="PYRENEAN MASTIFF">PYRENEAN MASTIFF</option>
                                    <option value="PORTUGUESE SHEEPDOG">PORTUGUESE SHEEPDOG</option>
                                    <option value="PORTUGUESE WARREN HOUND-PORTUGUESE PODENGO">PORTUGUESE WARREN
                                        HOUND-PORTUGUESE PODENGO</option>
                                    <option value="BRITTANY SPANIEL">BRITTANY SPANIEL</option>
                                    <option value="RAFEIRO OF ALENTEJO">RAFEIRO OF ALENTEJO</option>
                                    <option value="GERMAN SPITZ">GERMAN SPITZ</option>
                                    <option value="GERMAN WIRE- HAIRED POINTING DOG">GERMAN WIRE- HAIRED POINTING DOG
                                    </option>
                                    <option value="WEIMARANER">WEIMARANER</option>
                                    <option value="WESTPHALIAN DACHSBRACKE">WESTPHALIAN DACHSBRACKE</option>
                                    <option value="FRENCH BULLDOG">FRENCH BULLDOG</option>
                                    <option value="KLEINER MÜNSTERLÄNDER">KLEINER MÜNSTERLÄNDER</option>
                                    <option value="GERMAN HUNTING TERRIER">GERMAN HUNTING TERRIER</option>
                                    <option value="GERMAN SPANIEL">GERMAN SPANIEL</option>
                                    <option value="FRENCH WATER DOG">FRENCH WATER DOG</option>
                                    <option value="BLUE PICARDY SPANIEL">BLUE PICARDY SPANIEL</option>
                                    <option value="WIRE-HAIRED POINTING GRIFFON KORTHALS">WIRE-HAIRED POINTING GRIFFON
                                        KORTHALS</option>
                                    <option value="PICARDY SPANIEL">PICARDY SPANIEL</option>
                                    <option value="CLUMBER SPANIEL">CLUMBER SPANIEL</option>
                                    <option value="CURLY COATED RETRIEVER">CURLY COATED RETRIEVER</option>
                                    <option value="GOLDEN RETRIEVER">GOLDEN RETRIEVER</option>
                                    <option value="BRIARD">BRIARD</option>
                                    <option value="PONT-AUDEMER SPANIEL">PONT-AUDEMER SPANIEL</option>
                                    <option value="SAINT GERMAIN POINTER">SAINT GERMAIN POINTER</option>
                                    <option value="DOGUE DE BORDEAUX">DOGUE DE BORDEAUX</option>
                                    <option value="DEUTSCH LANGHAAR">DEUTSCH LANGHAAR</option>
                                    <option value="LARGE MUNSTERLANDER">LARGE MUNSTERLANDER</option>
                                    <option value="GERMAN SHORT-HAIRED POINTING DOG">GERMAN SHORT-HAIRED POINTING DOG
                                    </option>
                                    <option value="IRISH RED SETTER">IRISH RED SETTER</option>
                                    <option value="FLAT COATED RETRIEVER">FLAT COATED RETRIEVER</option>
                                    <option value="LABRADOR RETRIEVER">LABRADOR RETRIEVER</option>
                                    <option value="FIELD SPANIEL">FIELD SPANIEL</option>
                                    <option value="IRISH WATER SPANIEL">IRISH WATER SPANIEL</option>
                                    <option value="ENGLISH SPRINGER SPANIEL">ENGLISH SPRINGER SPANIEL</option>
                                    <option value="WELSH SPRINGER SPANIEL">WELSH SPRINGER SPANIEL</option>
                                    <option value="SUSSEX SPANIEL">SUSSEX SPANIEL</option>
                                    <option value="KING CHARLES SPANIEL">KING CHARLES SPANIEL</option>
                                    <option value="SMÅLANDSSTÖVARE">SMÅLANDSSTÖVARE</option>
                                    <option value="DREVER">DREVER</option>
                                    <option value="SCHILLERSTÖVARE">SCHILLERSTÖVARE</option>
                                    <option value="HAMILTONSTÖVARE">HAMILTONSTÖVARE</option>
                                    <option value="FRENCH POINTING DOG - GASCOGNE TYPE">FRENCH POINTING DOG - GASCOGNE
                                        TYPE</option>
                                    <option value="FRENCH POINTING DOG - PYRENEAN TYPE">FRENCH POINTING DOG - PYRENEAN
                                        TYPE</option>
                                    <option value="SWEDISH LAPPHUND">SWEDISH LAPPHUND</option>
                                    <option value="CAVALIER KING CHARLES SPANIEL">CAVALIER KING CHARLES SPANIEL
                                    </option>
                                    <option value="PYRENEAN MOUNTAIN DOG">PYRENEAN MOUNTAIN DOG</option>
                                    <option value="PYRENEAN SHEEPDOG - SMOOTH FACED">PYRENEAN SHEEPDOG - SMOOTH FACED
                                    </option>
                                    <option value="IRISH TERRIER">IRISH TERRIER</option>
                                    <option value="BOSTON TERRIER">BOSTON TERRIER</option>
                                    <option value="LONG-HAIRED PYRENEAN SHEEPDOG">LONG-HAIRED PYRENEAN SHEEPDOG
                                    </option>
                                    <option value="SLOVAKIAN CHUVACH">SLOVAKIAN CHUVACH</option>
                                    <option value="DOBERMANN">DOBERMANN</option>
                                    <option value="BOXER">BOXER</option>
                                    <option value="LEONBERGER">LEONBERGER</option>
                                    <option value="RHODESIAN RIDGEBACK">RHODESIAN RIDGEBACK</option>
                                    <option value="ROTTWEILER">ROTTWEILER</option>
                                    <option value="DACHSHUND">DACHSHUND</option>
                                    <option value="BULLDOG">BULLDOG</option>
                                    <option value="SERBIAN HOUND">SERBIAN HOUND</option>
                                    <option value="ISTRIAN SHORT-HAIRED HOUND">ISTRIAN SHORT-HAIRED HOUND</option>
                                    <option value="ISTRIAN WIRE-HAIRED HOUND">ISTRIAN WIRE-HAIRED HOUND</option>
                                    <option value="DALMATIAN">DALMATIAN</option>
                                    <option value="POSAVATZ HOUND">POSAVATZ HOUND</option>
                                    <option value="BOSNIAN BROKEN-HAIRED HOUND - CALLED BARAK">BOSNIAN BROKEN-HAIRED
                                        HOUND - CALLED BARAK</option>
                                    <option value="COLLIE ROUGH">COLLIE ROUGH</option>
                                    <option value="BULLMASTIFF">BULLMASTIFF</option>
                                    <option value="GREYHOUND">GREYHOUND</option>
                                    <option value="ENGLISH FOXHOUND">ENGLISH FOXHOUND</option>
                                    <option value="IRISH WOLFHOUND">IRISH WOLFHOUND</option>
                                    <option value="BEAGLE">BEAGLE</option>
                                    <option value="WHIPPET">WHIPPET</option>
                                    <option value="BASSET HOUND">BASSET HOUND</option>
                                    <option value="DEERHOUND">DEERHOUND</option>
                                    <option value="ITALIAN SPINONE">ITALIAN SPINONE</option>
                                    <option value="GERMAN SHEPHERD DOG">GERMAN SHEPHERD DOG</option>
                                    <option value="AMERICAN COCKER SPANIEL">AMERICAN COCKER SPANIEL</option>
                                    <option value="DANDIE DINMONT TERRIER">DANDIE DINMONT TERRIER</option>
                                    <option value="FOX TERRIER (WIRE)">FOX TERRIER (WIRE)</option>
                                    <option value="CASTRO LABOREIRO DOG">CASTRO LABOREIRO DOG</option>
                                    <option value="BOUVIER DES ARDENNES">BOUVIER DES ARDENNES</option>
                                    <option value="POODLE">POODLE</option>
                                    <option value="ESTRELA MOUNTAIN DOG">ESTRELA MOUNTAIN DOG</option>
                                    <option value="FRENCH SPANIEL">FRENCH SPANIEL</option>
                                    <option value="PICARDY SHEEPDOG">PICARDY SHEEPDOG</option>
                                    <option value="ARIEGE POINTING DOG">ARIEGE POINTING DOG</option>
                                    <option value="BOURBONNAIS POINTING DOG">BOURBONNAIS POINTING DOG</option>
                                    <option value="AUVERGNE POINTER">AUVERGNE POINTER</option>
                                    <option value="GIANT SCHNAUZER">GIANT SCHNAUZER</option>
                                    <option value="SCHNAUZER">SCHNAUZER</option>
                                    <option value="MINIATURE SCHNAUZER">MINIATURE SCHNAUZER</option>
                                    <option value="GERMAN PINSCHER">GERMAN PINSCHER</option>
                                    <option value="MINIATURE PINSCHER">MINIATURE PINSCHER</option>
                                    <option value="AFFENPINSCHER">AFFENPINSCHER</option>
                                    <option value="PORTUGUESE POINTING DOG">PORTUGUESE POINTING DOG</option>
                                    <option value="SLOUGHI">SLOUGHI</option>
                                    <option value="FINNISH LAPPONIAN DOG">FINNISH LAPPONIAN DOG</option>
                                    <option value="HOVAWART">HOVAWART</option>
                                    <option value="BOUVIER DES FLANDRES">BOUVIER DES FLANDRES</option>
                                    <option value="KROMFOHRLÄNDER">KROMFOHRLÄNDER</option>
                                    <option value="BORZOI - RUSSIAN HUNTING SIGHTHOUND">BORZOI - RUSSIAN HUNTING
                                        SIGHTHOUND</option>
                                    <option value="BERGAMASCO SHEPHERD DOG">BERGAMASCO SHEPHERD DOG</option>
                                    <option value="ITALIAN VOLPINO">ITALIAN VOLPINO</option>
                                    <option value="BOLOGNESE">BOLOGNESE</option>
                                    <option value="NEAPOLITAN MASTIFF">NEAPOLITAN MASTIFF</option>
                                    <option value="ITALIAN ROUGH-HAIRED SEGUGIO">ITALIAN ROUGH-HAIRED SEGUGIO</option>
                                    <option value="CIRNECO DELL'ETNA">CIRNECO DELL'ETNA</option>
                                    <option value="ITALIAN SIGHTHOUND">ITALIAN SIGHTHOUND</option>
                                    <option value="MAREMMA AND THE ABRUZZES SHEEPDOG">MAREMMA AND THE ABRUZZES SHEEPDOG
                                    </option>
                                    <option value="ITALIAN POINTING DOG">ITALIAN POINTING DOG</option>
                                    <option value="NORWEGIAN HOUND">NORWEGIAN HOUND</option>
                                    <option value="SPANISH HOUND">SPANISH HOUND</option>
                                    <option value="CHOW CHOW">CHOW CHOW</option>
                                    <option value="JAPANESE CHIN">JAPANESE CHIN</option>
                                    <option value="PEKINGESE">PEKINGESE</option>
                                    <option value="SHIH TZU">SHIH TZU</option>
                                    <option value="TIBETAN TERRIER">TIBETAN TERRIER</option>
                                    <option value="CANADIAN ESKIMO DOG">CANADIAN ESKIMO DOG</option>
                                    <option value="SAMOYED">SAMOYED</option>
                                    <option value="HANOVERIAN SCENT HOUND">HANOVERIAN SCENT HOUND</option>
                                    <option value="HELLENIC HOUND">HELLENIC HOUND</option>
                                    <option value="BICHON FRISE">BICHON FRISE</option>
                                    <option value="PUDELPOINTER">PUDELPOINTER</option>
                                    <option value="BAVARIAN MOUNTAIN SCENT HOUND">BAVARIAN MOUNTAIN SCENT HOUND
                                    </option>
                                    <option value="CHIHUAHUA">CHIHUAHUA</option>
                                    <option value="FRENCH TRICOLOUR HOUND">FRENCH TRICOLOUR HOUND</option>
                                    <option value="FRENCH WHITE & BLACK HOUND">FRENCH WHITE & BLACK HOUND</option>
                                    <option value="WETTERHOUN">WETTERHOUN</option>
                                    <option value="STABIJHOUN">STABIJHOUN</option>
                                    <option value="DUTCH SHEPHERD DOG">DUTCH SHEPHERD DOG</option>
                                    <option value="DRENTSCHE PARTRIDGE DOG">DRENTSCHE PARTRIDGE DOG</option>
                                    <option value="FILA BRASILEIRO">FILA BRASILEIRO</option>
                                    <option value="LANDSEER (EUROPEAN CONTINENTAL TYPE)">LANDSEER (EUROPEAN CONTINENTAL
                                        TYPE)</option>
                                    <option value="LHASA APSO">LHASA APSO</option>
                                    <option value="AFGHAN HOUND">AFGHAN HOUND</option>
                                    <option value="SERBIAN TRICOLOUR HOUND">SERBIAN TRICOLOUR HOUND</option>
                                    <option value="TIBETAN MASTIFF">TIBETAN MASTIFF</option>
                                    <option value="TIBETAN SPANIEL">TIBETAN SPANIEL</option>
                                    <option value="DEUTSCH STICHELHAAR">DEUTSCH STICHELHAAR</option>
                                    <option value="LITTLE LION DOG">LITTLE LION DOG</option>
                                    <option value="XOLOITZCUINTLE">XOLOITZCUINTLE</option>
                                    <option value="GREAT DANE">GREAT DANE</option>
                                    <option value="AUSTRALIAN SILKY TERRIER">AUSTRALIAN SILKY TERRIER</option>
                                    <option value="NORWEGIAN BUHUND">NORWEGIAN BUHUND</option>
                                    <option value="MUDI">MUDI</option>
                                    <option value="HUNGARIAN WIRE-HAIRED POINTER">HUNGARIAN WIRE-HAIRED POINTER
                                    </option>
                                    <option value="HUNGARIAN GREYHOUND">HUNGARIAN GREYHOUND</option>
                                    <option value="HUNGARIAN HOUND - TRANSYLVANIAN SCENT HOUND">HUNGARIAN HOUND -
                                        TRANSYLVANIAN SCENT HOUND</option>
                                    <option value="NORWEGIAN ELKHOUND GREY">NORWEGIAN ELKHOUND GREY</option>
                                    <option value="ALASKAN MALAMUTE">ALASKAN MALAMUTE</option>
                                    <option value="SLOVAKIAN HOUND">SLOVAKIAN HOUND</option>
                                    <option value="BOHEMIAN WIRE-HAIRED POINTING GRIFFON">BOHEMIAN WIRE-HAIRED POINTING
                                        GRIFFON</option>
                                    <option value="CESKY TERRIER">CESKY TERRIER</option>
                                    <option value="ATLAS MOUNTAIN DOG (AIDI)">ATLAS MOUNTAIN DOG (AIDI)</option>
                                    <option value="PHARAOH HOUND">PHARAOH HOUND</option>
                                    <option value="MAJORCA MASTIFF">MAJORCA MASTIFF</option>
                                    <option value="HAVANESE">HAVANESE</option>
                                    <option value="POLISH LOWLAND SHEEPDOG">POLISH LOWLAND SHEEPDOG</option>
                                    <option value="TATRA SHEPHERD DOG">TATRA SHEPHERD DOG</option>
                                    <option value="PUG">PUG</option>
                                    <option value="ALPINE DACHSBRACKE">ALPINE DACHSBRACKE</option>
                                    <option value="AKITA">AKITA</option>
                                    <option value="SHIBA">SHIBA</option>
                                    <option value="JAPANESE TERRIER">JAPANESE TERRIER</option>
                                    <option value="TOSA">TOSA</option>
                                    <option value="HOKKAIDO">HOKKAIDO</option>
                                    <option value="JAPANESE SPITZ">JAPANESE SPITZ</option>
                                    <option value="CHESAPEAKE BAY RETRIEVER">CHESAPEAKE BAY RETRIEVER</option>
                                    <option value="MASTIFF">MASTIFF</option>
                                    <option value="NORWEGIAN LUNDEHUND">NORWEGIAN LUNDEHUND</option>
                                    <option value="HYGEN HOUND">HYGEN HOUND</option>
                                    <option value="HALDEN HOUND">HALDEN HOUND</option>
                                    <option value="NORWEGIAN ELKHOUND BLACK">NORWEGIAN ELKHOUND BLACK</option>
                                    <option value="SALUKI">SALUKI</option>
                                    <option value="SIBERIAN HUSKY">SIBERIAN HUSKY</option>
                                    <option value="BEARDED COLLIE">BEARDED COLLIE</option>
                                    <option value="NORFOLK TERRIER">NORFOLK TERRIER</option>
                                    <option value="CANAAN DOG">CANAAN DOG</option>
                                    <option value="GREENLAND DOG">GREENLAND DOG</option>
                                    <option value="BRAZILIAN TRACKER">BRAZILIAN TRACKER</option>
                                    <option value="NORRBOTTENSPITZ">NORRBOTTENSPITZ</option>
                                    <option value="CROATIAN SHEPHERD DOG">CROATIAN SHEPHERD DOG</option>
                                    <option value="KARST SHEPHERD DOG">KARST SHEPHERD DOG</option>
                                    <option value="MONTENEGRIN MOUNTAIN HOUND">MONTENEGRIN MOUNTAIN HOUND</option>
                                    <option value="OLD DANISH POINTING DOG">OLD DANISH POINTING DOG</option>
                                    <option value="GRAND GRIFFON VENDEEN">GRAND GRIFFON VENDEEN</option>
                                    <option value="COTON DE TULEAR">COTON DE TULEAR</option>
                                    <option value="LAPPONIAN HERDER">LAPPONIAN HERDER</option>
                                    <option value="SPANISH GREYHOUND">SPANISH GREYHOUND</option>
                                    <option value="AMERICAN STAFFORDSHIRE TERRIER">AMERICAN STAFFORDSHIRE TERRIER
                                    </option>
                                    <option value="AUSTRALIAN CATTLE DOG">AUSTRALIAN CATTLE DOG</option>
                                    <option value="CHINESE CRESTED DOG">CHINESE CRESTED DOG</option>
                                    <option value="ICELANDIC SHEEPDOG">ICELANDIC SHEEPDOG</option>
                                    <option value="BEAGLE HARRIER">BEAGLE HARRIER</option>
                                    <option value="EURASIAN">EURASIAN</option>
                                    <option value="DOGO ARGENTINO">DOGO ARGENTINO</option>
                                    <option value="AUSTRALIAN KELPIE">AUSTRALIAN KELPIE</option>
                                    <option value="OTTERHOUND">OTTERHOUND</option>
                                    <option value="HARRIER">HARRIER</option>
                                    <option value="COLLIE SMOOTH">COLLIE SMOOTH</option>
                                    <option value="BORDER COLLIE">BORDER COLLIE</option>
                                    <option value="ROMAGNA WATER DOG">ROMAGNA WATER DOG</option>
                                    <option value="GERMAN HOUND">GERMAN HOUND</option>
                                    <option value="BLACK AND TAN COONHOUND">BLACK AND TAN COONHOUND</option>
                                    <option value="AMERICAN WATER SPANIEL">AMERICAN WATER SPANIEL</option>
                                    <option value="IRISH GLEN OF IMAAL TERRIER">IRISH GLEN OF IMAAL TERRIER</option>
                                    <option value="AMERICAN FOXHOUND">AMERICAN FOXHOUND</option>
                                    <option value="RUSSIAN-EUROPEAN LAIKA">RUSSIAN-EUROPEAN LAIKA</option>
                                    <option value="EAST SIBERIAN LAIKA">EAST SIBERIAN LAIKA</option>
                                    <option value="WEST SIBERIAN LAIKA">WEST SIBERIAN LAIKA</option>
                                    <option value="AZAWAKH">AZAWAKH</option>
                                    <option value="DUTCH SMOUSHOND">DUTCH SMOUSHOND</option>
                                    <option value="SHAR PEI">SHAR PEI</option>
                                    <option value="PERUVIAN HAIRLESS DOG">PERUVIAN HAIRLESS DOG</option>
                                    <option value="SAARLOOS WOLFHOND">SAARLOOS WOLFHOND</option>
                                    <option value="NOVA SCOTIA DUCK TOLLING RETRIEVER">NOVA SCOTIA DUCK TOLLING
                                        RETRIEVER</option>
                                    <option value="DUTCH SCHAPENDOES">DUTCH SCHAPENDOES</option>
                                    <option value="NEDERLANDSE KOOIKERHONDJE">NEDERLANDSE KOOIKERHONDJE</option>
                                    <option value="BROHOLMER">BROHOLMER</option>
                                    <option value="FRENCH WHITE AND ORANGE HOUND">FRENCH WHITE AND ORANGE HOUND
                                    </option>
                                    <option value="KAI">KAI</option>
                                    <option value="KISHU">KISHU</option>
                                    <option value="SHIKOKU">SHIKOKU</option>
                                    <option value="WIREHAIRED SLOVAKIAN POINTER">WIREHAIRED SLOVAKIAN POINTER</option>
                                    <option value="MAJORCA SHEPHERD DOG">MAJORCA SHEPHERD DOG</option>
                                    <option value="GREAT ANGLO-FRENCH TRICOLOUR HOUND">GREAT ANGLO-FRENCH TRICOLOUR
                                        HOUND</option>
                                    <option value="GREAT ANGLO-FRENCH WHITE AND BLACK HOUND">GREAT ANGLO-FRENCH WHITE
                                        AND BLACK HOUND</option>
                                    <option value="GREAT ANGLO-FRENCH WHITE & ORANGE HOUND">GREAT ANGLO-FRENCH WHITE &
                                        ORANGE HOUND</option>
                                    <option value="MEDIUM-SIZED ANGLO-FRENCH HOUND">MEDIUM-SIZED ANGLO-FRENCH HOUND
                                    </option>
                                    <option value="SOUTH RUSSIAN SHEPHERD DOG">SOUTH RUSSIAN SHEPHERD DOG</option>
                                    <option value="RUSSIAN BLACK TERRIER">RUSSIAN BLACK TERRIER</option>
                                    <option value="CAUCASIAN SHEPHERD DOG">CAUCASIAN SHEPHERD DOG</option>
                                    <option value="CANARIAN WARREN HOUND">CANARIAN WARREN HOUND</option>
                                    <option value="IRISH RED AND WHITE SETTER">IRISH RED AND WHITE SETTER</option>
                                    <option value="KANGAL SHEPHERD DOG">KANGAL SHEPHERD DOG</option>
                                    <option value="CZECHOSLOVAKIAN WOLFDOG">CZECHOSLOVAKIAN WOLFDOG</option>
                                    <option value="POLISH GREYHOUND">POLISH GREYHOUND</option>
                                    <option value="KOREA JINDO DOG">KOREA JINDO DOG</option>
                                    <option value="CENTRAL ASIA SHEPHERD DOG">CENTRAL ASIA SHEPHERD DOG</option>
                                    <option value="SPANISH WATER DOG">SPANISH WATER DOG</option>
                                    <option value="ITALIAN SHORT-HAIRED SEGUGIO">ITALIAN SHORT-HAIRED SEGUGIO</option>
                                    <option value="THAI RIDGEBACK DOG">THAI RIDGEBACK DOG</option>
                                    <option value="PARSON RUSSELL TERRIER">PARSON RUSSELL TERRIER</option>
                                    <option value="SAINT MIGUEL CATTLE DOG">SAINT MIGUEL CATTLE DOG</option>
                                    <option value="BRAZILIAN TERRIER">BRAZILIAN TERRIER</option>
                                    <option value="AUSTRALIAN SHEPHERD">AUSTRALIAN SHEPHERD</option>
                                    <option value="ITALIAN CANE CORSO">ITALIAN CANE CORSO</option>
                                    <option value="AMERICAN AKITA">AMERICAN AKITA</option>
                                    <option value="JACK RUSSELL TERRIER">JACK RUSSELL TERRIER</option>
                                    <option value="PRESA CANARIO">PRESA CANARIO</option>
                                    <option value="WHITE SWISS SHEPHERD DOG">WHITE SWISS SHEPHERD DOG</option>
                                    <option value="TAIWAN DOG">TAIWAN DOG</option>
                                    <option value="ROMANIAN MIORITIC SHEPHERD DOG">ROMANIAN MIORITIC SHEPHERD DOG
                                    </option>
                                    <option value="ROMANIAN CARPATHIAN SHEPHERD DOG">ROMANIAN CARPATHIAN SHEPHERD DOG
                                    </option>
                                    <option value="AUSTRALIAN STUMPY TAIL CATTLE DOG">AUSTRALIAN STUMPY TAIL CATTLE DOG
                                    </option>
                                    <option value="RUSSIAN TOY">RUSSIAN TOY</option>
                                    <option value="CIMARRÓN URUGUAYO">CIMARRÓN URUGUAYO</option>
                                    <option value="POLISH HUNTING DOG">POLISH HUNTING DOG</option>
                                    <option value="BOSNIAN AND HERZEGOVINIAN - CROATIAN SHEPHERD DOG">BOSNIAN AND
                                        HERZEGOVINIAN - CROATIAN SHEPHERD DOG</option>
                                    <option value="DANISH-SWEDISH FARMDOG">DANISH-SWEDISH FARMDOG</option>
                                    <option value="ROMANIAN BUCOVINA SHEPHERD">ROMANIAN BUCOVINA SHEPHERD</option>
                                    <option value="THAI BANGKAEW DOG">THAI BANGKAEW DOG</option>
                                    <option value="MINIATURE BULL TERRIER">MINIATURE BULL TERRIER</option>
                                    <option value="LANCASHIRE HEELER">LANCASHIRE HEELER</option>
                                    <option value="SEGUGIO MAREMMANO">SEGUGIO MAREMMANO</option>
                                    <option value="KINTAMANI-BALI DOG">KINTAMANI-BALI DOG</option>
                                    <option value="PRAGUE RATTER">PRAGUE RATTER</option>
                                    <option value="BOHEMIAN SHEPHERD DOG">BOHEMIAN SHEPHERD DOG</option>
                                    <option value="YAKUTIAN LAIKA">YAKUTIAN LAIKA</option>
                                    <option value="ESTONIAN HOUND">ESTONIAN HOUND</option>
                                    <option value="MINIATURE AMERICAN SHEPHERD">MINIATURE AMERICAN SHEPHERD</option>
                                    <option value="TRANSMONTANO MASTIFF">TRANSMONTANO MASTIFF</option>
                                    <option value="CONTINENTAL BULLDOG">CONTINENTAL BULLDOG</option>
                                    <option value="VALENCIAN TERRIER">VALENCIAN TERRIER</option>
                                </select>
                            </div>

                            <div class="myselect">
                                <select class="form-select" wire:model.live="searchByGenderTerm"
                                    aria-label="Default select example">
                                    <option selected value="">Color</option>
                                    @foreach ($lost_dogs as $found_dog)
                                        <option value="{{ $found_dog->color }}">{{ $found_dog->color }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="top-donate text-center mt-4">
                                <a href="#">Apply Filters</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="lost-dog-list-right">
                        <div class="row">
                            @if ($lost_dogs->count() > 0)
                                @php
                                    $sl =
                                        $lost_dogs->perPage() * $lost_dogs->currentPage() - ($lost_dogs->perPage() - 1);
                                @endphp
                                @foreach ($lost_dogs as $found_dog)
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="lost-dog-list-right-text">
                                            <img class="img-fluid" src="{{ asset($found_dog->images) }}"
                                                alt="Lost Dog">
                                            <h4><a
                                                    href="{{ route('app.found.dogs.details', ['id' => $found_dog->id]) }}">{{ $found_dog->name }}</a>
                                            </h4>
                                            <p>{{ $found_dog->address }}
                                            <ul>
                                                <li>{{ $found_dog->gender }}</li>
                                            </ul>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <tr>
                                    <td style="padding-top: 100px;" colspan="7" class="text-center pt-5 pb-5">No
                                        dogs found!</td>
                                </tr>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="dog-pagination">
                                    {{ $lost_dogs->links('livewire.pagination-links') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
    <script src="{{ asset('assets/app/js/select2.min.js') }}"></script>

    <script type="text/javascript">
        var j = jQuery.noConflict();
        j(document).ready(function() {
            j('.select2').select2();
        });
    </script>

    <script>
        function getCurrentLocation() {
            navigator.geolocation.getCurrentPosition((position) => {
                const p = position.coords;

                $('#latitude').val(p.latitude);
                $('#longitude').val(p.longitude);

                @this.set('latitude', p.latitude);
                @this.set('longitude', p.longitude);

                reverseGeocode(p.latitude, p.longitude);
                setLocation(p.latitude, p.longitude, '');

            }, function(error) {
                if (error.code === 1) {
                    alert('Permission denied. Please allow location access in your browser settings.');
                } else {
                    alert('Error getting location: ' + error.message);
                }
            });
        }

        function reverseGeocode(latitude, longitude) {
            const apiUrl =
                `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}&zoom=18&addressdetails=1`;

            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    // console.log(data.address);
                    if (data.display_name) {
                        // console.log(data.address);

                        // var road = data.address.road != undefined ? data.address.road + ', ' : '';
                        // var county = data.address.county != undefined ? data.address.county + ', ' : '';
                        // var postcode = data.address.postcode != undefined ? data.address.postcode + ', ' : '';
                        // var state = data.address.state != undefined ? data.address.state : '';

                        const fullAddress = data.display_name;
                        // const fullAddress = road + county + postcode + state;
                        $('#location_address').val(fullAddress);
                        // $('#location_address').html(fullAddress);
                        @this.set('address', fullAddress);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        const resultsWrapperHTML = document.getElementById("search-result");
        let mapOptions = {
            center: [23.9456166, 90.2526382],
            zoom: 10
        }

        let map = new L.map('map', mapOptions);

        let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
        map.addLayer(layer);


        let marker = null;
        map.on('click', (event) => {

            if (marker !== null) {
                map.removeLayer(marker);
            }

            marker = L.marker([event.latlng.lat, event.latlng.lng]).addTo(map);

            document.getElementById('latitude').value = event.latlng.lat;
            document.getElementById('longitude').value = event.latlng.lng;

            @this.set('latitude', event.latlng.lat);
            @this.set('longitude', event.latlng.lng);
            reverseGeocode(event.latlng.lat, event.latlng.lng);
        });


        // search location handler
        let typingInterval

        // typing handler
        function onTyping(e) {
            clearInterval(typingInterval)
            const {
                value
            } = e

            typingInterval = setInterval(() => {
                clearInterval(typingInterval)
                searchLocation(value)
            }, 100)
        }

        // search handler
        function searchLocation(keyword) {
            if (keyword) {
                fetch(`https://nominatim.openstreetmap.org/search?q=${keyword}&format=json`)
                    .then((response) => {
                        return response.json()
                    }).then(json => {
                        if (json.length > 0) return renderResults(json)
                    })
            }
        }

        // render results
        function renderResults(result) {
            let resultsHTML = ""

            result.map((n) => {
                resultsHTML +=
                    `<li><a href="javascript:void(0)" onclick="setLocation(${n.lat},${n.lon},'${n.display_name}')">${n.display_name}</a></li>`
            })

            resultsWrapperHTML.innerHTML = resultsHTML
        }

        // clear results
        function clearResults() {
            resultsWrapperHTML.innerHTML = ""
        }

        // set location from search result
        function setLocation(lat, lon, display_name) {
            // set map focus
            map.setView(new L.LatLng(lat, lon), 10)

            // regenerate marker position
            if (marker !== null) {
                map.removeLayer(marker);
            }
            marker = L.marker([lat, lon]).addTo(map);

            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lon;

            $('#location_address').val(display_name);

            @this.set('latitude', lat);
            @this.set('longitude', lon);
            @this.set('searchByAddressTerm', display_name);

            // clear results
            clearResults()
        }
    </script>
@endpush
