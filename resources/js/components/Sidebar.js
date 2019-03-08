import React from "react";

function getRandom(arr, n) {
    var result = new Array(n),
        len = arr.length,
        taken = new Array(len);
    if (n > len)
        throw new RangeError("getRandom: more elements taken than available");
    while (n--) {
        var x = Math.floor(Math.random() * len);
        result[n] = arr[x in taken ? taken[x] : x];
        taken[x] = --len in taken ? taken[len] : len;
    }
    return result;
}

/* Main Component */
class Sidebar extends React.Component {
    render() {
        return (
            <div className="article-list new-articles">
                <h3>New articles</h3>
                <ul>
                    {this.props.articles
                        .slice(
                            this.props.articles.length - 10,
                            this.props.articles.length
                        )
                        .reverse()
                        .map(article => {
                            return (
                                <li key={article.id}>
                                    <a href="#"> {article.title} </a>
                                </li>
                            );
                        })}
                </ul>
            </div>
        );
    }
}

export default Sidebar;
