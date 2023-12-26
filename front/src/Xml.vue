<template>
    <main style="min-height: 60vh; display: flex; flex-direction: row; gap: 30px; justify-content: center; align-items: center;">
        <div style="margin-top: 200px; width: 500px; display: flex; flex-wrap: wrap; width: 100%; justify-content: center; align-items: center; gap: 30px;">
            <div style="border: 1px solid black; border-radius: 10px;" v-for="(house, index) in houses" :key="index" class="house">
                <h2>{{ house['Назва_будинку'] }}</h2>
                <img :src="house['Фото']" alt="House Image" />
                <p>Ціна: {{ house['Ціна'] }}</p>
                <p v-for="(value, key) in house['Інші_характеристики']" :key="key">
                    {{ key }}: {{ value }}
                </p>
            </div>
        </div>
    </main>
</template>

<script>
export default {
    data() {
        return {
            houses: []
        };
    },
    mounted() {
        this.fetchHouses();
    },
    methods: {
        fetchHouses() {
            fetch('/api/xml') // Replace with your API endpoint
                .then(response => response.text())
                .then(str => new window.DOMParser().parseFromString(str, 'text/xml'))
                .then(data => this.parseXML(data))
                .catch(error => console.error('Error:', error));
        },
        parseXML(xmlData) {
            const houses = [];
            const houseNodes = xmlData.querySelectorAll('houses > *');

            houseNodes.forEach(node => {
                const house = {};
                node.childNodes.forEach(childNode => {
                    if (childNode.nodeType === 1) {
                        if (childNode.childNodes.length === 1) {
                            house[childNode.nodeName] = childNode.textContent;
                        } else {
                            const subObject = {};
                            childNode.childNodes.forEach(subChildNode => {
                                if (subChildNode.nodeType === 1) {
                                    subObject[subChildNode.nodeName] = subChildNode.textContent;
                                }
                            });
                            house[childNode.nodeName] = subObject;
                        }
                    }
                });
                houses.push(house);
            });

            this.houses = houses;
        }
    }
};
</script>

<style>
.house {
    border: 1px solid #ccc;
    padding: 10px;
    margin: 10px 0;
}
</style>
