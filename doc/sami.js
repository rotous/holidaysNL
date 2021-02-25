
window.projectVersion = 'master';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:rotous" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="rotous.html">rotous</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:rotous_holidays" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="rotous/holidays.html">holidays</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:rotous_holidays_exceptions" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="rotous/holidays/exceptions.html">exceptions</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:rotous_holidays_exceptions_YearOutOfBoundsException" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="rotous/holidays/exceptions/YearOutOfBoundsException.html">YearOutOfBoundsException</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:rotous_holidays_HolidaysNL" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="rotous/holidays/HolidaysNL.html">HolidaysNL</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "rotous.html", "name": "rotous", "doc": "Namespace rotous"},{"type": "Namespace", "link": "rotous/holidays.html", "name": "rotous\\holidays", "doc": "Namespace rotous\\holidays"},{"type": "Namespace", "link": "rotous/holidays/exceptions.html", "name": "rotous\\holidays\\exceptions", "doc": "Namespace rotous\\holidays\\exceptions"},
            
            {"type": "Class", "fromName": "rotous\\holidays", "fromLink": "rotous/holidays.html", "link": "rotous/holidays/HolidaysNL.html", "name": "rotous\\holidays\\HolidaysNL", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method___construct", "name": "rotous\\holidays\\HolidaysNL::__construct", "doc": "&quot;Constructor&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method__getCurrentYear", "name": "rotous\\holidays\\HolidaysNL::_getCurrentYear", "doc": "&quot;Returns the current year as integer&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method__validateYear", "name": "rotous\\holidays\\HolidaysNL::_validateYear", "doc": "&quot;Check if a valid year was given. Should be between 0 and 3000!\nVery arbitrarily use the year 3000 as last possible date&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method__validateYearForKingOrQueensDay", "name": "rotous\\holidays\\HolidaysNL::_validateYearForKingOrQueensDay", "doc": "&quot;Check if a valid year was given. Should be between 1891 and 3000!&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_setYear", "name": "rotous\\holidays\\HolidaysNL::setYear", "doc": "&quot;Setter for the year property&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_getNewYearDateTime", "name": "rotous\\holidays\\HolidaysNL::getNewYearDateTime", "doc": "&quot;Returns the new years date (easy one to begin with :-)) as DateTime object.&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_getNewYear", "name": "rotous\\holidays\\HolidaysNL::getNewYear", "doc": "&quot;Returns the new years date (easy one to begin with :-))\nIf no year is given or null is given, the current year will be used.&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_getEasterDateTime", "name": "rotous\\holidays\\HolidaysNL::getEasterDateTime", "doc": "&quot;Returns Easter date for the given year. If no year is given or null is given, the\ncurrent year will be used.&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_getEaster", "name": "rotous\\holidays\\HolidaysNL::getEaster", "doc": "&quot;Returns Easter date for the given year. If no year is given or null is given, the\ncurrent year will be used.&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_getSecondEasterDayDateTime", "name": "rotous\\holidays\\HolidaysNL::getSecondEasterDayDateTime", "doc": "&quot;Returns Second Easter Day date for the given year. If no year is given or null is given, the\ncurrent year will be used.&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_getSecondEasterDay", "name": "rotous\\holidays\\HolidaysNL::getSecondEasterDay", "doc": "&quot;Returns Second Easter Day date for the given year. If no year is given or null is given, the\ncurrent year will be used.&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_getAscensionDayDateTime", "name": "rotous\\holidays\\HolidaysNL::getAscensionDayDateTime", "doc": "&quot;Returns Ascension date for the given year. If no year is given or null is given, the\ncurrent year will be used.&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_getAscensionDay", "name": "rotous\\holidays\\HolidaysNL::getAscensionDay", "doc": "&quot;Returns Ascension date for the given year. If no year is given or null is given, the\ncurrent year will be used.&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_getPentecostDateTime", "name": "rotous\\holidays\\HolidaysNL::getPentecostDateTime", "doc": "&quot;Returns Pentecost date for the given year. If no year is given or null is given, the\ncurrent year will be used.&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_getPentecost", "name": "rotous\\holidays\\HolidaysNL::getPentecost", "doc": "&quot;Returns Pentecost date for the given year. If no year is given or null is given, the\ncurrent year will be used.&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_getSecondPentecostDayDateTime", "name": "rotous\\holidays\\HolidaysNL::getSecondPentecostDayDateTime", "doc": "&quot;Returns Second Pentecost Day date for the given year. If no year is given or null is given, the\ncurrent year will be used.&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_getSecondPentecostDay", "name": "rotous\\holidays\\HolidaysNL::getSecondPentecostDay", "doc": "&quot;Returns Second Pentecost Day date for the given year. If no year is given or null is given, the\ncurrent year will be used.&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_getChristmasDateTime", "name": "rotous\\holidays\\HolidaysNL::getChristmasDateTime", "doc": "&quot;Returns Christmas date for the given year. If no year is given or null is given, the\ncurrent year will be used.&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_getChristmas", "name": "rotous\\holidays\\HolidaysNL::getChristmas", "doc": "&quot;Returns Christmas date for the given year. If no year is given or null is given, the\ncurrent year will be used.&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_getSecondChristmasDayDateTime", "name": "rotous\\holidays\\HolidaysNL::getSecondChristmasDayDateTime", "doc": "&quot;Returns Second Christmas Day date for the given year. If no year is given or null is given, the\ncurrent year will be used.&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_getSecondChristmasDay", "name": "rotous\\holidays\\HolidaysNL::getSecondChristmasDay", "doc": "&quot;Returns Second Christmas Day date for the given year. If no year is given or null is given, the\ncurrent year will be used.&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_getKingOrQueensDayDateTime", "name": "rotous\\holidays\\HolidaysNL::getKingOrQueensDayDateTime", "doc": "&quot;Returns Queens Day or Kings Day date for the given year.&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_getKingOrQueensDay", "name": "rotous\\holidays\\HolidaysNL::getKingOrQueensDay", "doc": "&quot;Returns Queens Day or Kings date for the given year.&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_getHolidaysDateTime", "name": "rotous\\holidays\\HolidaysNL::getHolidaysDateTime", "doc": "&quot;Returns all holidays for the given year as an array of \\DateTime objects&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_getHolidays", "name": "rotous\\holidays\\HolidaysNL::getHolidays", "doc": "&quot;Returns all holidays for the given year as an array of strings with\nthe format dd-mm-yyyy&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_isHolidayDateTime", "name": "rotous\\holidays\\HolidaysNL::isHolidayDateTime", "doc": "&quot;Checks if a date specified by the given \\DateTime object is a holiday&quot;"},
                    {"type": "Method", "fromName": "rotous\\holidays\\HolidaysNL", "fromLink": "rotous/holidays/HolidaysNL.html", "link": "rotous/holidays/HolidaysNL.html#method_isHoliday", "name": "rotous\\holidays\\HolidaysNL::isHoliday", "doc": "&quot;Checks if a date specified by the given \\DateTime object is a holiday&quot;"},
            
            {"type": "Class", "fromName": "rotous\\holidays\\exceptions", "fromLink": "rotous/holidays/exceptions.html", "link": "rotous/holidays/exceptions/YearOutOfBoundsException.html", "name": "rotous\\holidays\\exceptions\\YearOutOfBoundsException", "doc": "&quot;&quot;"},
                    
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


