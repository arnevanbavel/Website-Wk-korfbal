@extends("frontmasterpage", ['albums' => $albums])

@section("content")
		<div class="pageContainer" id="changeHeader">
			<div class="ticketsContainer">
				<div class="blockTitle">
					<h1>Tickets</h1>
				</div>
				<div class="ticketContainer">
					<div class="ticket">
						<div class="description">
							<p>IKF WKC 2015 ticket | Passepartout</p>
						</div>
						<div class="price">
							<p>50,00 EUR</p>
						</div>
						<div class="duration">
							<p>whole tournament</p>
						</div>
					</div>
					<h1>All games in Ghent + Tielen + Antwerp</h1>
					<div class="ticket">
						<div class="description">
							<p>First Round Ticket</p>
						</div>
						<div class="price">
							<p>5,00 EUR</p>
						</div>
						<div class="duration">
							<p>per day</p>
						</div>
					</div>
					<div class="ticket">
						<div class="description">
							<p>First Round Ticket (< 15 years old)</p>
						</div>
						<div class="price">
							<p>free admission</p>
						</div>
						<div class="duration">
							<p></p>
						</div>
					</div>
					<div class="ticket">
						<div class="description">
							<p>Quarter Final Ticket</p>
						</div>
						<div class="price">
							<p>5,00 EUR</p>
						</div>
						<div class="duration">
							<p>per day</p>
						</div>
					</div>
					<div class="ticket">
						<div class="description">
							<p>Quarter Final Ticket (< 15 years old)</p>
						</div>
						<div class="price">
							<p>free admission</p>
						</div>
						<div class="duration">
							<p></p>
						</div>
					</div>
					<div class="ticket">
						<div class="description">
							<p>COMBI * First Round + Quarter Final ticket (Ghent + Tielen)</p>
						</div>
						<div class="price">
							<p>20,00 EUR</p>
						</div>
						<div class="duration">
							<p>5 days</p>
						</div>
					</div>
					<div class="ticket">
						<div class="description">
							<p>Semi Final Ticket</p>
						</div>
						<div class="price">
							<p>10,00 EUR</p>
						</div>
						<div class="duration">
							<p>per day</p>
						</div>
					</div>
					<div class="ticket">
						<div class="description">
							<p>Semi Final Ticket (< 15 years old)</p>
						</div>
						<div class="price">
							<p>3,00 EUR</p>
						</div>
						<div class="duration">
							<p>per day</p>
						</div>
					</div>
					<div class="ticket">
						<div class="description">
							<p>Final Ticket (Saturday Nov 7th)</p>
						</div>
						<div class="price">
							<p>10,00 EUR</p>
						</div>
						<div class="duration">
							<p>per day</p>
						</div>
					</div>
					<div class="ticket">
						<div class="description">
							<p>Final Ticket (< 15 years old) (Saturday Nov 7th)</p>
						</div>
						<div class="price">
							<p>3,00 EUR</p>
						</div>
						<div class="duration">
							<p>per day</p>
						</div>
					</div>
					<div class="ticket">
						<div class="description">
							<p>Final Ticket (Saturday Nov 8th) (all)</p>
						</div>
						<div class="price">
							<p>20,00 EUR</p>
						</div>
						<div class="duration">
							<p>per day</p>
						</div>
					</div>
					<div class="ticket">
						<div class="description">
							<p>COMBI * 2 Semi Final Ticket Days + 2 Final Tickets Days</p>
						</div>
						<div class="price">
							<p>35,00 EUR</p>
						</div>
						<div class="duration">
							<p></p>
						</div>
					</div>
				</div>
				<div class="blockTitle bottomBlockTitle">
					<a href="tickets.html">Order your tickets</a>
				</div>
			</div>
		</div>
@stop