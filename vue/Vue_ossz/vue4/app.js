Vue.component('custom-row', {
    data: function() {
        return {
            count: 0
        }
    },
    template: `
    <tr>
        <td>
            <button @click="count++">Add 1</button>
        </td>
        <td>
            Counter: {{ count }}
            </td>
    </tr>
    `
})

let app = new Vue({
    el: '#app'
})