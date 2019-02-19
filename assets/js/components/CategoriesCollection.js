import React from 'react'
import Category from './Category'

export default class CategoriesCollection extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            categories: []
        }
    }

    componentDidMount() {
        fetch('/categories')
            .then(results => {
                return results.json();
            })
            .then(data => {
                let categories = data.map((category) => {
                    return (
                        <Category id={category.id} key={category.id} name={category.name} description={category.description}/>
                    )
                })
                this.setState({categories: categories})
            })
    }

    render() {
        return (
            <div className='container'>
                {this.state.categories}
            </div>
        )
    }
}

