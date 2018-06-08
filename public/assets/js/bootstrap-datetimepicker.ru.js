// moment.js language configuration
// language : russian (ru)
// author : Viktorminator : https://github.com/Viktorminator
// Author : Menelion ElensĂºle : https://github.com/Oire

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define(['moment'], factory); // AMD
    } else if (typeof exports === 'object') {
        module.exports = factory(require('../moment')); // Node
    } else {
        factory(window.moment); // Browser global
    }
}(function (moment) {
    function plural(word, num) {
        var forms = word.split('_');
        return num % 10 === 1 && num % 100 !== 11 ? forms[0] : (num % 10 >= 2 && num % 10 <= 4 && (num % 100 < 10 || num % 100 >= 20) ? forms[1] : forms[2]);
    }

    function relativeTimeWithPlural(number, withoutSuffix, key) {
        var format = {
            'mm': 'Đ¼Đ¸Đ½ÑƒÑ‚Đ°_Đ¼Đ¸Đ½ÑƒÑ‚Ñ‹_Đ¼Đ¸Đ½ÑƒÑ‚',
            'hh': 'Ñ‡Đ°Ñ_Ñ‡Đ°ÑĐ°_Ñ‡Đ°ÑĐ¾Đ²',
            'dd': 'Đ´ĐµĐ½ÑŒ_Đ´Đ½Ñ_Đ´Đ½ĐµĐ¹',
            'MM': 'Đ¼ĐµÑÑÑ†_Đ¼ĐµÑÑÑ†Đ°_Đ¼ĐµÑÑÑ†ĐµĐ²',
            'yy': 'Đ³Đ¾Đ´_Đ³Đ¾Đ´Đ°_Đ»ĐµÑ‚'
        };
        if (key === 'm') {
            return withoutSuffix ? 'Đ¼Đ¸Đ½ÑƒÑ‚Đ°' : 'Đ¼Đ¸Đ½ÑƒÑ‚Ñƒ';
        }
        else {
            return number + ' ' + plural(format[key], +number);
        }
    }

    function monthsCaseReplace(m, format) {
        var months = {
            'nominative': 'ÑĐ½Đ²Đ°Ñ€ÑŒ_Ñ„ĐµĐ²Ñ€Đ°Đ»ÑŒ_Đ¼Đ°Ñ€Ñ‚_Đ°Đ¿Ñ€ĐµĐ»ÑŒ_Đ¼Đ°Đ¹_Đ¸ÑĐ½ÑŒ_Đ¸ÑĐ»ÑŒ_Đ°Đ²Đ³ÑƒÑÑ‚_ÑĐµĐ½Ñ‚ÑĐ±Ñ€ÑŒ_Đ¾ĐºÑ‚ÑĐ±Ñ€ÑŒ_Đ½Đ¾ÑĐ±Ñ€ÑŒ_Đ´ĐµĐºĐ°Đ±Ñ€ÑŒ'.split('_'),
            'accusative': 'ÑĐ½Đ²Đ°Ñ€Ñ_Ñ„ĐµĐ²Ñ€Đ°Đ»Ñ_Đ¼Đ°Ñ€Ñ‚Đ°_Đ°Đ¿Ñ€ĐµĐ»Ñ_Đ¼Đ°Ñ_Đ¸ÑĐ½Ñ_Đ¸ÑĐ»Ñ_Đ°Đ²Đ³ÑƒÑÑ‚Đ°_ÑĐµĐ½Ñ‚ÑĐ±Ñ€Ñ_Đ¾ĐºÑ‚ÑĐ±Ñ€Ñ_Đ½Đ¾ÑĐ±Ñ€Ñ_Đ´ĐµĐºĐ°Đ±Ñ€Ñ'.split('_')
        },

        nounCase = (/D[oD]? *MMMM?/).test(format) ?
            'accusative' :
            'nominative';

        return months[nounCase][m.month()];
    }

    function monthsShortCaseReplace(m, format) {
        var monthsShort = {
            'nominative': 'ÑĐ½Đ²_Ñ„ĐµĐ²_Đ¼Đ°Ñ€_Đ°Đ¿Ñ€_Đ¼Đ°Đ¹_Đ¸ÑĐ½ÑŒ_Đ¸ÑĐ»ÑŒ_Đ°Đ²Đ³_ÑĐµĐ½_Đ¾ĐºÑ‚_Đ½Đ¾Ñ_Đ´ĐµĐº'.split('_'),
            'accusative': 'ÑĐ½Đ²_Ñ„ĐµĐ²_Đ¼Đ°Ñ€_Đ°Đ¿Ñ€_Đ¼Đ°Ñ_Đ¸ÑĐ½Ñ_Đ¸ÑĐ»Ñ_Đ°Đ²Đ³_ÑĐµĐ½_Đ¾ĐºÑ‚_Đ½Đ¾Ñ_Đ´ĐµĐº'.split('_')
        },

        nounCase = (/D[oD]? *MMMM?/).test(format) ?
            'accusative' :
            'nominative';

        return monthsShort[nounCase][m.month()];
    }

    function weekdaysCaseReplace(m, format) {
        var weekdays = {
            'nominative': 'Đ²Đ¾ÑĐºÑ€ĐµÑĐµĐ½ÑŒĐµ_Đ¿Đ¾Đ½ĐµĐ´ĐµĐ»ÑŒĐ½Đ¸Đº_Đ²Ñ‚Đ¾Ñ€Đ½Đ¸Đº_ÑÑ€ĐµĐ´Đ°_Ñ‡ĐµÑ‚Đ²ĐµÑ€Đ³_Đ¿ÑÑ‚Đ½Đ¸Ñ†Đ°_ÑÑƒĐ±Đ±Đ¾Ñ‚Đ°'.split('_'),
            'accusative': 'Đ²Đ¾ÑĐºÑ€ĐµÑĐµĐ½ÑŒĐµ_Đ¿Đ¾Đ½ĐµĐ´ĐµĐ»ÑŒĐ½Đ¸Đº_Đ²Ñ‚Đ¾Ñ€Đ½Đ¸Đº_ÑÑ€ĐµĐ´Ñƒ_Ñ‡ĐµÑ‚Đ²ĐµÑ€Đ³_Đ¿ÑÑ‚Đ½Đ¸Ñ†Ñƒ_ÑÑƒĐ±Đ±Đ¾Ñ‚Ñƒ'.split('_')
        },

        nounCase = (/\[ ?[Đ’Đ²] ?(?:Đ¿Ñ€Đ¾ÑˆĐ»ÑƒÑ|ÑĐ»ĐµĐ´ÑƒÑÑ‰ÑƒÑ)? ?\] ?dddd/).test(format) ?
            'accusative' :
            'nominative';

        return weekdays[nounCase][m.day()];
    }

    return moment.lang('ru', {
        months : monthsCaseReplace,
        monthsShort : monthsShortCaseReplace,
        weekdays : weekdaysCaseReplace,
        weekdaysShort : "Đ²Ñ_Đ¿Đ½_Đ²Ñ‚_ÑÑ€_Ñ‡Ñ‚_Đ¿Ñ‚_ÑĐ±".split("_"),
        weekdaysMin : "Đ²Ñ_Đ¿Đ½_Đ²Ñ‚_ÑÑ€_Ñ‡Ñ‚_Đ¿Ñ‚_ÑĐ±".split("_"),
        monthsParse : [/^ÑĐ½Đ²/i, /^Ñ„ĐµĐ²/i, /^Đ¼Đ°Ñ€/i, /^Đ°Đ¿Ñ€/i, /^Đ¼Đ°[Đ¹|Ñ]/i, /^Đ¸ÑĐ½/i, /^Đ¸ÑĐ»/i, /^Đ°Đ²Đ³/i, /^ÑĐµĐ½/i, /^Đ¾ĐºÑ‚/i, /^Đ½Đ¾Ñ/i, /^Đ´ĐµĐº/i],
        longDateFormat : {
            LT : "HH:mm",
            L : "DD.MM.YYYY",
            LL : "D MMMM YYYY Đ³.",
            LLL : "D MMMM YYYY Đ³., LT",
            LLLL : "dddd, D MMMM YYYY Đ³., LT"
        },
        calendar : {
            sameDay: '[Đ¡ĐµĐ³Đ¾Đ´Đ½Ñ Đ²] LT',
            nextDay: '[Đ—Đ°Đ²Ñ‚Ñ€Đ° Đ²] LT',
            lastDay: '[Đ’Ñ‡ĐµÑ€Đ° Đ²] LT',
            nextWeek: function () {
                return this.day() === 2 ? '[Đ’Đ¾] dddd [Đ²] LT' : '[Đ’] dddd [Đ²] LT';
            },
            lastWeek: function () {
                switch (this.day()) {
                case 0:
                    return '[Đ’ Đ¿Ñ€Đ¾ÑˆĐ»Đ¾Đµ] dddd [Đ²] LT';
                case 1:
                case 2:
                case 4:
                    return '[Đ’ Đ¿Ñ€Đ¾ÑˆĐ»Ñ‹Đ¹] dddd [Đ²] LT';
                case 3:
                case 5:
                case 6:
                    return '[Đ’ Đ¿Ñ€Đ¾ÑˆĐ»ÑƒÑ] dddd [Đ²] LT';
                }
            },
            sameElse: 'L'
        },
        relativeTime : {
            future : "Ñ‡ĐµÑ€ĐµĐ· %s",
            past : "%s Đ½Đ°Đ·Đ°Đ´",
            s : "Đ½ĐµÑĐºĐ¾Đ»ÑŒĐºĐ¾ ÑĐµĐºÑƒĐ½Đ´",
            m : relativeTimeWithPlural,
            mm : relativeTimeWithPlural,
            h : "Ñ‡Đ°Ñ",
            hh : relativeTimeWithPlural,
            d : "Đ´ĐµĐ½ÑŒ",
            dd : relativeTimeWithPlural,
            M : "Đ¼ĐµÑÑÑ†",
            MM : relativeTimeWithPlural,
            y : "Đ³Đ¾Đ´",
            yy : relativeTimeWithPlural
        },

        // M. E.: those two are virtually unused but a user might want to implement them for his/her website for some reason

        meridiem : function (hour, minute, isLower) {
            if (hour < 4) {
                return "Đ½Đ¾Ñ‡Đ¸";
            } else if (hour < 12) {
                return "ÑƒÑ‚Ñ€Đ°";
            } else if (hour < 17) {
                return "Đ´Đ½Ñ";
            } else {
                return "Đ²ĐµÑ‡ĐµÑ€Đ°";
            }
        },

        ordinal: function (number, period) {
            switch (period) {
            case 'M':
            case 'd':
            case 'DDD':
                return number + '-Đ¹';
            case 'D':
                return number + '-Đ³Đ¾';
            case 'w':
            case 'W':
                return number + '-Ñ';
            default:
                return number;
            }
        },

        week : {
            dow : 1, // Monday is the first day of the week.
            doy : 7  // The week that contains Jan 1st is the first week of the year.
        }
    });
}));