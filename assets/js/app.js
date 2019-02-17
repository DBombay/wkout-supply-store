import React from 'react';
import ReactDom from 'react-dom';
import { BrowserRouter } from 'react-router-dom';
import HomeContainer from "./containers/HomeContainer.js";

class App extends React.Component {
    constructor(props) {
        super(props)
    }

    render() {
        return (
            <BrowserRouter>
                <div>
                    <HomeContainer/>
                </div>
            </BrowserRouter>
        )
    }
}

ReactDom.render(<App />, document.getElementById('root'));