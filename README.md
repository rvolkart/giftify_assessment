# About Magic Test

This is an application that loads cards from Magic's API and shows them as a table to users.
Users can add any card to their deck by clicking on the button.

## How it works

I've used the Bootstrap 5 framework to make the page responsive and have a good interface for the tables.
Also, I've used Datatables to make a searchable table and have a smart search on the table of cards.

To make it faster I've used JQuery for any operation of this task. For example, when the user clicks on the 'Add' button, the record of the card will be added to the right section that shows the user's deck. Also, the 'Add' button will be hidden to limit users to add duplicate cards. To calculate average mana cost I've used JQuery and each time that the user clicks on the button, we have an updated count of the deck's card, the sum of mana cost and average mana cost.

It might be not the best way to manage the user's deck, but this is the fast way to make it. However, the best way to have a secure application is to use a database and make all of these actions dynamic.