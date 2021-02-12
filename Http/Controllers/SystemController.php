<?php

namespace Modules\PanelCore\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\PanelCore\Http\Actions\ColorSchemaEditForm;
use Symfony\Component\HttpFoundation\Request;

class SystemController extends Controller
{

    public function colorSchema()
    {

        $css = file_get_contents(module_path("PanelCore") . '/tailwind.config.js');
        preg_match_all('/#([[:xdigit:]]{3}){1,2}\b/', $css, $colors);

        $form = new ColorSchemaEditForm($colors[0]);

        return view('panel_ui::dynamic.edit', compact('form'));
    }

    public function saveColorSchema(Request $request)
    {

        $this->makeTailwindFile($request->colors);
        exec("cd  ".module_path("PanelCore")." && npm run prod");
        return redirect()->back()->with("msg", "success");

    }

    public function makeTailwindFile($colors)
    {
        $fileContent = "module.exports = {
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
                                '../Admin/Resources/views/**/*.blade.php',
                                './Resources/views/**/*.blade.php',
                                './Resources/assets/sass/*.scss',
                            ],

                            options: {
                                whitelistPatterns: [/span/],
                                whitelistPatternsChildren: [/span/],
                            }
                        },
                        theme: {
                            extend: {
                                colors: {
                                    theme: {
                                        primary: '$colors[0]',
                                        secondary: '$colors[1]',
                                        tertiaryColor:'$colors[2]',
                                        secondaryDark: '$colors[3]',
                                        secondaryLight: '$colors[4]',
                                        white: '$colors[5]',
                                        grey: '$colors[6]',
                                        whitesmoke: '$colors[7]',
                                        lightblue: '$colors[8]',
                                        purple : '$colors[9]',
                                        info: '$colors[10]',
                                        danger: '$colors[11]',
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
                    }";


        file_put_contents(module_path("PanelCore") . '/tailwind.config.js', $fileContent);

    }

}
