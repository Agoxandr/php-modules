var editor = new EditorJS({

    // Create a holder for the Editor and pass its ID
    holder: 'editorjs',

    /**
     * Available Tools list.
     * Pass Tool's class or Settings object for each Tool you want to use
     */
    tools: {
        header: {
            class: Header,
            inlineToolbar: true
        },
        list: {
            class: List,
            inlineToolbar: true,
            shortcut: 'CMD+SHIFT+L'
        },
        // embed: {
        //     class: Embed,
        //     config: {
        //         services: {
        //             youtube: true
        //         }
        //     }
        // },
        image: {
            class: SimpleImage,
            inlineToolbar: ['link'],
        },
        quote: {
            class: Quote,
            inlineToolbar: true,
            config: {
                quotePlaceholder: 'Enter a quote',
                captionPlaceholder: 'Quote\'s author',
            },
            shortcut: 'CMD+SHIFT+O'
        }
    },

    // Previously saved data that should be rendered
    data: savedData
});

function save() {
    editor.save().then((outputData) => {
        send(JSON.stringify(outputData));
    }).catch((error) => {
        console.log('Saving failed: ', error);
    });
}

function send(jsonString) {
    $.post("savePost.php", jsonString).done(function (data) {
        $("#post").html("").append(data);
    });
}