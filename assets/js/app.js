import React from 'react';
import ReactDom from 'react-dom';
import HomeContainer from "./containers/HomeContainer.js";
import {HomeNav} from "./components"

class App extends React.Component {
    constructor(props) {
        super(props)
    }

    render() {
        return (
            <div>
                <HomeNav/>
                <HomeContainer/>
            </div>
        )
    }
}

ReactDom.render(<App/>, document.getElementById('root'));