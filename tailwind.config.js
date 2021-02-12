module.exports = {
    variants: {
        zIndex: ['responsive', 'hover'],
        position: ['responsive', 'hover'],
        padding: ['responsive', 'last'],
        margin: ['responsive', 'last'],
        borderWidth: ['responsive', 'last']
    },
    plugins: [
        require('tailwindcss-rtl'),
    ],
    purge: {
        mode: 'all',
        content: [
            '../../resources/views/errors/*.blade.php',
            '../Admin/Resources/views/**/*.blade.php',
            './Resources/views/**/*.blade.php',
            './Resources/assets/sass/*.scss',
        ],

        options: {
            whitelistPatterns: [/span/, /datepicker/, /jq-toast/, /gap-/],
            whitelistPatternsChildren: [/span/, /datepicker/, /tail-select/, /jq-toast/, /gap-/],
        }
    },
    theme: {
        extend: {
            colors: {
                theme: {
                    primary: '#1C3FAA',
                    secondary: '#1C3FAA',
                    tertiaryColor: '#f1f5f8',
                    secondaryDark: '#365a74',
                    secondaryLight: '#1A389F',
                    white: '#fff',
                    grey: '#5a8ab5',
                    whitesmoke: '#000000',
                    lightblue: '#d2dfea',
                    purple: '#683672',
                    info: '#91c714',
                    danger: '#d32929',
                }
            },
            fontFamily: {
                'roboto': ['Roboto'],
                'shabnam': ['Shabnam']
            },
            container: {
                center: true
            },
            maxWidth: {
                '1/4': '25%',
                '1/2': '50%',
                '3/4': '75%'
            },
            screens: {
                'sm': '640px',
                'md': '768px',
                'lg': '1024px',
                'xl': '1280px',
                'xxl': '1600px'
            }
        }
    }
}
