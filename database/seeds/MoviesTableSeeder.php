<?php

use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
          ['title'=>'Aladdin','genre'=>'Romance','description'=>'A kindhearted street urchin named Aladdin embarks on a magical adventure after finding a lamp that releases a wisecracking genie while a power-hungry Grand Vizier vies for the same lamp that has the power to make their deepest wishes come true.','rating'=>'7.2','photo'=>'Aladin.jpg'],
          ['title'=>'The Angry Birds Movie 2','genre'=>'Animation','description'=>'The Angry Birds Movie 2 Sub Indo – Red, Chuck, Bomb and the rest of their feathered friends are surprised when a green pig suggests that they put aside their differences and unite to fight a common threat. Aggressive birds from an island covered in ice are planning to use an elaborate weapon to destroy the fowl and swine.','rating'=>'6.5','photo'=>'Angry Birds.jpg'],
          ['title'=>'Avengers: Endgame','genre'=>'Action','description'=>'After the devastating events of Avengers: Infinity War, the universe is in ruins due to the efforts of the Mad Titan, Thanos. With the help of remaining allies, the Avengers must assemble once more in order to undo Thanos’ actions and restore order to the universe once and for all, no matter what consequences may be in store.','rating'=>'8.6','photo'=>'Avanger End Game.jpg'],
          ['title'=>'Captain Marvel','genre'=>'Action','description'=>'The story follows Carol Danvers as she becomes one of the universe’s most powerful heroes when Earth is caught in the middle of a galactic war between two alien races. Set in the 1990s, Captain Marvel is an all-new adventure from a previously unseen period in the history of the Marvel Cinematic Universe.','rating'=>'7','photo'=>'Captain Marvel.jpg'],
          ['title'=>'Dora and the Lost City of Gold','genre'=>'Comedy','description'=>'Dora and the Lost City of Gold Sub Indo – Dora, a girl who has spent most of her life exploring the jungle with her parents, now must navigate her most dangerous adventure yet: high school. Always the explorer, Dora quickly finds herself leading Boots (her best friend, a monkey), Diego, and a rag tag group of teens on an adventure to save her parents and solve the impossible mystery behind a lost Inca civilization.','rating'=>'6','photo'=>'Dora.jpg'],
          ['title'=>'How to Train Your Dragon: The Hidden World','genre'=>'Animation','description'=>'As Hiccup fulfills his dream of creating a peaceful dragon utopia, Toothless’ discovery of an untamed, elusive mate draws the Night Fury away. When danger mounts at home and Hiccup’s reign as village chief is tested, both dragon and rider must make impossible decisions to save their kind.','rating'=>'7.5','photo'=>'Dragon.jpg'],
          ['title'=>'Fast & Furious Presents: Hobbs & Shaw','genre'=>'Action','description'=>'Fast & Furious Presents: Hobbs & Shaw Sub Indo – A spinoff of The Fate of the Furious, focusing on Johnson’s US Diplomatic Security Agent Luke Hobbs forming an unlikely alliance with Statham’s Deckard Shaw.','rating'=>'6.8','photo'=>'Fast&Furious.jpg'],
          ['title'=>'Godzilla: King of the Monsters','genre'=>'Action','description'=>'Follows the heroic efforts of the crypto-zoological agency Monarch as its members face off against a battery of god-sized monsters, including the mighty Godzilla, who collides with Mothra, Rodan, and his ultimate nemesis, the three-headed King Ghidorah. When these ancient super-species – thought to be mere myths – rise again, they all vie for supremacy, leaving humanity’s very existence hanging in the balance.','rating'=>'6.2','photo'=>'Godzilla.jpg'],
          ['title'=>'It Chapter Two','genre'=>'Horror','description'=>'27 years after overcoming the malevolent supernatural entity Pennywise, the former members of the Losers’ Club, who have grown up and moved away from Derry, are brought back together by a devastating phone call','rating'=>'6.9','photo'=>'IT.jpg'],
          ['title'=>'John Wick: Chapter 3 – Parabellum','genre'=>'Crime','description'=>'Super-assassin John Wick returns with a $14 million price tag on his head and an army of bounty-hunting killers on his trail. After killing a member of the shadowy international assassin’s guild, the High Table, John Wick is excommunicado, but the world’s most ruthless hit men and women await his every turn.','rating'=>'7.7','photo'=>'Jhon Wick 3.jpg'],
          ['title'=>'Joker','genre'=>'Crime','description'=>'During the 1980s, a failed stand-up comedian is driven insane and turns to a life of crime and chaos in Gotham City while becoming an infamous psychopathic crime figure.','rating'=>'8.8','photo'=>'Joker.jpg'],
          ['title'=>'The Lion King','genre'=>'Adventure','description'=>'Simba idolises his father, King Mufasa, and takes to heart his own royal destiny. But not everyone in the kingdom celebrates the new cub’s arrival. Scar, Mufasa’s brother—and former heir to the throne—has plans of his own. The battle for Pride Rock is ravaged with betrayal, tragedy and drama, ultimately resulting in Simba’s exile. With help from a curious pair of newfound friends, Simba will have to figure out how to grow up and take back what is rightfully his.','rating'=>'7.1','photo'=>'Lion King.jpg'],
          ['title'=>'Men in Black: International','genre'=>'Action','description'=>'The Men in Black have always protected the Earth from the scum of the universe. In this new adventure, they tackle their biggest, most global threat to date: a mole in the Men in Black organization.','rating'=>'5.6','photo'=>'MIB.jpg'],
          ['title'=>'Shazam!','genre'=>'Action','description'=>'A boy is given the ability to become an adult superhero in times of need with a single magic word.','rating'=>'7.2','photo'=>'Shazam.jpg'],
          ['title'=>'Spider-Man: Far from Home','genre'=>'Action','description'=>'Peter Parker and his friends go on a summer trip to Europe. However, they will hardly be able to rest – Peter will have to agree to help Nick Fury uncover the mystery of creatures that cause natural disasters and destruction throughout the continent.','rating'=>'7.9','photo'=>'Spiderman.jpg'],
          ['title'=>'Toy Story 4','genre'=>'Animation','description'=>'Woody has always been confident about his place in the world and that his priority is taking care of his kid, whether that’s Andy or Bonnie. But when Bonnie adds a reluctant new toy called “Forky” to her room, a road trip adventure alongside old and new friends will show Woody how big the world can be for a toy.','rating'=>'8.1','photo'=>'Toy Story 4.jpg'],

        ];
        foreach ($data as $d){
            DB::table('movies')->insert([
                'title' => $d['title'],
                'genre' => $d['genre'],
                'description' => $d['description'],
                'rating' => $d['rating'],
                'photo'=> $d['photo'],
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
