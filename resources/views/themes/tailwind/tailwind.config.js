module.exports = {
    darkMode: 'class',
    content: [
        './**/*.php',
        './*.php',
        './assets/**/*.scss',
        './assets/**/*.js',
    ],
    theme: {
        extend: {
            rotate: {
                '-1': '-1deg',
                '-2': '-2deg',
                '-3': '-3deg',
                '1': '1',
                '2': '2deg',
                '3': '3deg',
            },
            borderRadius: {
                'xl': '0.8rem',
                'xxl': '1rem',
            },
            height: {
                '1/2': '0.125rem',
                '2/3': '0.1875rem',
            },
            maxHeight: {
                '16': '16rem',
                '20': '20rem',
                '24': '24rem',
                '32': '32rem',
            },
            inset: {
                '1/2': '50%',
            },
            width: {
                '96': '24rem',
                '104': '26rem',
                '128': '32rem',
            },
            transitionDelay: {
                '450': '450ms',
            },
            colors: {
                'wave': {
                    50: '#faf5ff',
                    100: '#f3e8ff',
                    200: '#e9d5ff',
                    300: '#d8b4fe',
                    400: '#c084fc',
                    500: '#a855f7',
                    600: '#9333ea',
                    700: '#7e22ce',
                    800: '#6b21a8',
                    900: '#581c87',
                },
                'slate': {
                    50: '#f8fafc',
                    100: '#f1f5f9',
                    200: '#e2e8f0',
                    300: '#cbd5e1',
                    400: '#94a3b8',
                    500: '#64748b',
                    600: '#475569',
                    700: '#334155',
                    800: '#1e293b',
                    900: '#0f172a',
                },
            }
        }
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography')
    ]
}
